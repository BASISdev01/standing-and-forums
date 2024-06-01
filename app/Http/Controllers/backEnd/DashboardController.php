<?php

namespace App\Http\Controllers\backEnd;

use App\AppConstant;
use App\Exports\MemberExport;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberList;
use App\Traits\MailTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use SendGrid\Mail\TypeException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DashboardController extends Controller
{
    use MailTrait;

    public function index()
    {
        return view('backEnd.dashboard');
    }

    /**
     * @throws TypeException
     */
    public function downloadPass($id): BinaryFileResponse|RedirectResponse
    {
        $member = Member::select('reg_id', 'company_name', 'name', 'email')->whereId($id)->first();
        if ($member) {
            $pdfPath = generateEntryPass($member);
            return response()->download(storage_path('app/' . $pdfPath));
        }

        return to_route('admin.dashboard')->with('error', 'Sorry Member not found');
    }

    /**
     * @throws TypeException
     */
    public function mailSend($id, $member = null): JsonResponse
    {
        $member = $member ?? Member::select('id', 'reg_id', 'company_name', 'name', 'email')->whereId($id)->first();
        if ($member) {
            $pdfPath = generateEntryPass($member);
            $pdfContent = Storage::get($pdfPath);
            $body = str_replace('{{code}}', sprintf("%04d", $member->reg_id), emailContent()['body']);
            $this->sendMail($member->email, emailContent()['subject'], $body, $pdfContent);
            $member->update(['sent' => true]);
            return response()->json('Email has been sent');
        }
        return response()->json('Member not found...', 400);
    }

    public function register(Request $request): JsonResponse
    {
        $types = implode(',', array_map('strtolower', array_keys(AppConstant::getTypes())));
        $data = $request->validate([
            'company_name' => [
                'nullable',
                'max:160', $request->type === 'yes' ? Rule::unique('members') : "",
            ],
            'name' => 'required|max:150',
            'email' => 'nullable|required_if:is_email,1|email|unique:members,email',
            'mobile' => 'nullable|digits:11',
            'type' => "required|in:{$types}",
            'is_email' => 'nullable|in:1',
        ]);
        $memberData = [
            'reg_id' => getRegID(),
            'company_name' => $data['company_name'],
            'membership_id' => $request['membership_no'] ?? null,
            'com_name' => strtolower(str_replace(['-', '_', '(', ')', '.'], '', $data['company_name'])),
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'auth_rep' => strtoupper($data['type']),
            'sent' => $request['is_email'] == 1 ? 1 : 0,
            'logo' => $request->company_logo ? "https://basis.org.bd/public/{$request->company_logo}" : null,
            'image' => $request->rep_image ? "https://basis.org.bd/public{$request->rep_image}" : null,
            'is_manual' => true,
            'admin_id' => Auth::guard('admin')->id(),
            'action_by' => Auth::guard('admin')->user()->name,
        ];
        DB::beginTransaction();
        try {
            $member = Member::create($memberData);
            if ($request['is_email'] == 1) {
                $this->mailSend($member->id, $member);
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Registration successful....',
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }

    }

    public function excelExport(Request $request)
    {
        $memberData = Member::orderBy('reg_id', 'desc')
            ->when($request->company_name, fn($query) => $query->where('company_name', 'like', "%{$request->company_name}%"))
            ->when($request->rep_name, fn($query) => $query->where('name', 'like', "%{$request->rep_name}%"))
            ->when($request->reg_id, fn($query) => $query->where('reg_id', $request->reg_id))
            ->when($request->mobile, fn($query) => $query->where('mobile', $request->mobile))
            ->when($request->type, fn($query) => $query->where('auth_rep', $request->type))
            ->when($request->pass, fn($query) => $query->where('is_entry', $request->pass == 2 ? '0' : 1))
            ->when($request->reg_type, fn($query) => $query->where('is_manual', $request->reg_type == 2 ? '0' : 1))
            ->when($request->date, fn($query) => $query->whereDate('created_at', $request->date))
            ->whereNotNull('auth_rep')
            ->get();
        $filename = 'Registration_Export_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new MemberExport($memberData), $filename);

    }

    public function enter($id, $status): JsonResponse
    {
        Member::find($id)->update([
            'is_entry' => $status,
            'entry_by' => Auth::guard()->id()
        ]);
        return response()->json(true);
    }


    public function verify()
    {
        return view('backEnd.pages.verify');
    }

    //data import form json
    public function importMemberList(): string
    {
        $members = json_decode(file_get_contents(public_path('/json/members.json')), true);
        DB::beginTransaction();
        try {
            foreach ($members as $member) {
                DB::table('member_lists')->insert([
                    'company_name' => $member['company_name'],
                    'membership_no' => $member['membership_no'],
                    'logo' => $member['logo'],
                    'name' => $member['primary']['name'],
                    'email' => $member['primary']['email'],
                    'mobile' => $member['primary']['mobile'],
                    'image' => $member['primary']['image'],
                ]);
            }
            DB::commit();
            return 'success';
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function companySearch(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = MemberList::where('com_name', 'like', '%' . $query . '%')
            ->orWhere('company_name','like', "%{$query}%")->limit(5)->get();
        return response()->json($suggestions);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }


}
