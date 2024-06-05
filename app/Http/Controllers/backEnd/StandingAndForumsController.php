<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Priority;
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

    public function destroy(Request $request){

        Priority::where('registration_id',$request->id)->delete();
        Registration::where('id',$request->id)->delete();
        return response()->json( $request->id . " This Application Successfully Deleted");
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }
}
