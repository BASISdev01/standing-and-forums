<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Priority;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registrationForm');

    }

    public function formSubmit(Request $request)
    {
        dd($request->all());
        $firstPiorityDataset = $this->pioritystore($request->all(),'first');
        $secondPiorityDataset = $this->pioritystore($request->all(),'second');
    }

    protected function pioritystore($request ,$priorityLabel, $registration_id = null) {
        // Define validation rules
        $rules = [
            "{$priorityLabel}_priority" => 'required',
            "{$priorityLabel}_priority_type" => 'required',
            "{$priorityLabel}_par_name" => 'required',
            "{$priorityLabel}_par_designation" => 'required',
            "{$priorityLabel}_par_email" => 'required',
            "{$priorityLabel}_par_phone" => 'required',
            "{$priorityLabel}_priority_relevance_to_committee" => 'required',
            "{$priorityLabel}_priority_support_or_improvement" => 'required',
            "{$priorityLabel}_priority_identified_gaps" => 'required',
            "{$priorityLabel}_priority_three_collaborates" => 'required',
            "{$priorityLabel}_priority_community_or_policy" => 'required',
            "{$priorityLabel}_priority_contribute_hours" => 'required',
            "{$priorityLabel}_priority_attend_monthly_meeting" => 'required',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);

        if($registration_id = null){

            $registationDataser=[
                'membership_id' => Auth::user()->membership_id,
                'par_facebook_link' => $request->par_facebook_link,
                'par_linkedIn_link' => $request->par_linkedIn_link,
                'company_name' => Auth::user()->company_name,
                'company_address' => Auth::user()->com_name,
                'is_agree' => $request->is_agree,
                'year' => now('y'),
                'submitted_date' => now()->format('d-M-Y:m-s'),
            ];

            $Registration = Registration::create($registationDataser);

        }


        $priorityDataSate = [
            'registration_id' => $Registration->id ?? $registration_id,
            'priority' => $request["{$priorityLabel}_priority"],
            'priority_lable' => $priorityLabel,
            'priority_type' => $request["{$priorityLabel}_priority_type"],
            'par_name' => $request["{$priorityLabel}_par_name"],
            'par_designation' => $request["{$priorityLabel}_par_designation"],
            'par_email' => $request["{$priorityLabel}_par_email"],
            'par_phone' => $request["{$priorityLabel}_par_phone"],
            'priority_relevance_to_committee' => $request["{$priorityLabel}_priority_relevance_to_committee"],
            'priority_support_or_improvement' => $request["{$priorityLabel}_priority_support_or_improvement"],
            'priority_identified_gaps' => $request["{$priorityLabel}_priority_identified_gaps"],
            'priority_three_collaborates' => $request["{$priorityLabel}_priority_three_collaborates"],
            'priority_community_or_policy' => $request["{$priorityLabel}_priority_community_or_policy"],
            'priority_contribute_hours' => $request["{$priorityLabel}_priority_contribute_hours"],
            'priority_attend_monthly_meeting' => $request["{$priorityLabel}_priority_attend_monthly_meeting"],
        ];

        $Registration = Priority::create($priorityDataSate);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('https://basis.org.bd/member/dashboard');

    }
}
