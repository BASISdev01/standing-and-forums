<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Library\Jwt;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = '/';

    public function login()
    {
        $jwtObj = new Jwt();
        $key = 'QxR7HWu5G1TNt278S3w05HIJOuybLGNW9U7zaH6UGLDR4TBUQxIHzybzjMMzvzPG';
        $algorithm = ['HS256'];
        $token = isset($_GET['token']) ? trim($_GET['token']) : '';
        if (empty($token)) {
            return redirect('https://www.basis.org.bd/member-login');
        }

        $token_payload = $jwtObj->decode(base64_decode($token), $key, $algorithm);
        if (empty($token_payload->membership_id)) {
            return redirect('https://www.basis.org.bd/member-login');
        }
        $member_id = $token_payload->membership_id;
        $getMember = Member::where('membership_id', $member_id)->first();

        $updateData = [
            'address' => $token_payload->address ?? "",
            'logo' => $token_payload->logo ?? "",
            'mobile' => $token_payload->representative_contact_number ?? "",
            'email' => $token_payload->representative_email ?? "",
            'company_name' => $token_payload->company_name ?? "",
            'com_name' => $token_payload->company_name ? strtolower(str_replace(['-', '_', '(', ')', '.'], '', $token_payload->company_name)) : ""
        ];

        if ($getMember) {
            $getMember->update($updateData);
            Auth::loginUsingId($getMember->id);
            return redirect('/');
        }

        $insertData = [
            'membership_id' => $member_id,
            'name' => $token_payload->name ?? "",
            'designation' => $token_payload->designation ?? "",
            'email' => $token_payload->representative_email ?? "",
            'mobile' => $token_payload->representative_contact_number ?? "",
            'address' => $updateData['address'],
            'logo' => $updateData['logo'],
            'company_name' => $updateData['company_name'],
            'com_name' => $updateData['com_name']
        ];

        $insertMember = Member::create($insertData);

        if ($insertMember) {
            Auth::loginUsingId($insertMember->id);
            return redirect('/');
        } else {
            abort(401, 'Unauthorized member information');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
