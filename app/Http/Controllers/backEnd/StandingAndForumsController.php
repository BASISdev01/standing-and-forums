<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Priority;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EoiExport;
use Illuminate\Support\Facades\Auth;

class StandingAndForumsController extends Controller
{
    protected $dirApply = 'backEnd.standingAndForums.apply';

    public function dashboard()
    {
        return view('backEnd.dashboard');
    }

    public function index(Request $request)
    {
        $standingCommittee = standingCommittee();
        $forums = forums();
        $Years = range(now()->format('Y'), 2000);
        $registrationDataset = Priority::with('registration')->Filter($request)->paginate(15);
        return view($this->dirApply.'.index', compact('standingCommittee','forums','Years','registrationDataset'));
    }

    public function view(Request $request)
    {
        $registerDataset = Priority::where('id', $request->id)->with('registration')->first();
        return view($this->dirApply.'.editForm', compact('registerDataset'));
    }

    public function destroy(Request $request)
    {
        Priority::where('registration_id',$request->id)->delete();
        Registration::where('id',$request->id)->delete();
        return response()->json( $request->id . "This Application Successfully Deleted");
    }

    public function reject(Request $request)
    {
        Priority::where('id',$request->id)->update(['status'=>'rejected','approved_date' =>null]);
        return response()->json( $request->id . "This Application Successfully Rejected");
    }

    public function approve(Request $request)
    {
        Priority::where('id',$request->id)->update(['status'=>'approved','approved_date' =>now()->format('Y-m-d')]);
        return response()->json( $request->id . "This Application Successfully Approved");
    }

    public function pending(Request $request)
    {
        Priority::where('id',$request->id)->update(['status'=>'pending','approved_date' =>null]);
        return response()->json( $request->id . "This Application Successfully Pending");
    }

    public function storeComment(Request $request)
    {
        Priority::where('id',$request->id)->update(['comment'=>$request->comment]);
        return response()->json( $request->id . "Successfully store comments");
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }

    public function update(Request $request){
        $request->validate([
            'priority' => 'required',
            'priority_type' => 'required',
            'priority_lable' => 'required',
            'par_designation' => 'required',
            'par_email' => 'required',
            'par_phone' => 'required',
        ]);
        $priorityDataset=$request->only((new Priority)->getFillable());
        $registerDataset=[
            'par_facebook_link' => $request->par_facebook_link,
            'par_linkedIn_link' => $request->par_linkedIn_link,
        ];
        Priority::where('id',$request->priority_id)->update($priorityDataset);
        Registration::where('id',$request->register_id)->update($registerDataset);
        return redirect()->back()->with('success', 'Change Successful!');

    }

    public function export(Request $request){
        $requestData = json_decode(urldecode($request->query('request')), true);
        $applyData = Priority::with('registration')->ExportFilter($requestData)->get();
        $export = new EoiExport($applyData);

        return Excel::download($export, 'EoI.xlsx');

    }
}
