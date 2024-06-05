<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Priority;
use Illuminate\Support\Facades\Auth;
use App\Traits\MailTrait;

class RegistrationController extends Controller
{
    use MailTrait;

    public function index()
    {
        $is_register = Registration::where('membership_id', Auth::user()->membership_id)->with('priority')->first();
         if(empty($is_register)){
            return view('registrationForm', compact('is_register'));
         }else{
            return view('viewRegistationData', compact('is_register'));

         }
    }

    public function formSubmit(Request $request)
    {
        if (!empty($request->first_priority_type)) {
            $firstPiorityDataset = $this->pioritystore($request, 'first');
        }

        if (!empty($request->second_priority_type)) {
            $secondPiorityDataset = $this->pioritystore($request, 'second', $firstPiorityDataset->registration_id);
        }
        $this->sendMailForRegistration($request->first_par_email);
        return redirect('/')->with('success', 'Application Successful!');
    }

    protected function pioritystore(Request $request, $priorityLabel, $registration_id = null)
    {
        // Define validation rules
        // $rules = [
        //     "{$priorityLabel}_priority" => 'required',
        //     "{$priorityLabel}_priority_type" => 'required',
        //     "{$priorityLabel}_priority_relevance_to_committee" => 'required',
        //     "{$priorityLabel}_priority_community_or_policy" => 'required',
        //     "{$priorityLabel}_priority_contribute_hours" => 'required|max:20',
        //     "{$priorityLabel}_priority_attend_monthly_meeting" => 'required',
        // ];

        // // Validate the request
        // $validatedData = $request->validate($rules);

        if (empty($registration_id)) {

            $registationDataser = [
                'membership_id' => Auth::user()->membership_id,
                'par_facebook_link' => $request->par_facebook_link,
                'par_linkedIn_link' => $request->par_linkedIn_link,
                'company_name' => Auth::user()->company_name,
                'company_address' => Auth::user()->com_name,
                'is_agree' => $request->is_agree,
                'year' => now()->format('Y'),
                'submitted_date' => now()->format('Y-m-d'),
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
            'priority_support_or_improvement' => json_encode($request["{$priorityLabel}_priority_support_or_improvement"]),
            'priority_identified_gaps' => json_encode($request["{$priorityLabel}_priority_identified_gaps"]),
            'priority_three_collaborates' => $request["{$priorityLabel}_priority_three_collaborates"],
            'priority_community_or_policy' => $request["{$priorityLabel}_priority_community_or_policy"],
            'priority_contribute_hours' => $request["{$priorityLabel}_priority_contribute_hours"],
            'priority_attend_monthly_meeting' => $request["{$priorityLabel}_priority_attend_monthly_meeting"],
        ];

        $Registration = Priority::create($priorityDataSate);
        return $Registration;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('https://basis.org.bd/member/dashboard');
    }
}
