<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Traits\MailTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SendGrid\Mail\TypeException;

class HomeController extends Controller
{
    use MailTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @throws TypeException
     */
    public function formSubmit(Request $request)
    {
        if (empty(Auth::user()->auth_rep)) {
            // Validation rules
            $rules = [
                'participate' => 'required|in:YES,NO',
                'name' => 'nullable|required_if:participate,NO|max:120',
                'mobile' => 'nullable|required_if:participate,NO|digits_between:11,13',
                'email' => 'nullable|required_if:participate,NO|email|max:150',
            ];

            // Custom error messages
            $messages = [
                'participate.required' => 'Please select YES/NO',
                'name.required_if' => 'The name field is required.',
                'mobile.required_if' => 'The mobile field is required.',
                'email.required_if' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);
            // If validation fails, return validation errors
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $regID = getRegID();
            if ($request->participate === 'NO') {
                $isSubmit = Member::where('id', auth()->id())
                    ->update([
                        'auth_rep' => 'NO',
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'reg_id' => $regID,
                    ]);
            } else {
                $repImage = DB::table('member_lists')->select('image')->where('membership_no', Auth::user()->membership_id)->value('image');
                $isSubmit = Member::where('id', auth()->id())->update([
                    'auth_rep' => 'YES',
                    'reg_id' => $regID,
                    'image' => $repImage ? "https://basis.org.bd/public{$repImage}" : null
                ]);
            }
            //Sent Email with entry pass
            if ($isSubmit) {
                $member = Member::select('id', 'reg_id', 'name', 'email')->find(Auth::id());
                $pdfPath = generateEntryPass($member);
                $pdfContent = Storage::get($pdfPath);
                $body = str_replace('{{code}}', sprintf("%04d", $member->reg_id), emailContent()['body']);
                $this->sendMail($member->email, emailContent()['subject'], $body, $pdfContent);
                $member->update(['sent' => true]);
            }
            //Sent Email with entry pass
            Auth::logout();
            return response()->json(['message' => 'Form submitted successfully']);
        } else {
            return response()->json('You have already submitted the EoI', 400);
        }

    }
}
