<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration;
use App\Models\Priority;
use App\Models\Member;

if (!function_exists('generateEntryPass')) {

    function generateEntryPass($member): string
    {
        $file_name = str_replace([' ', '.'], '_', strtolower($member->name)) . '_' . $member->reg_id . '.pdf';
        $pdfPath = 'public/gate_pass/' . $file_name;
        if (!Storage::exists($pdfPath)) {
            $pdf = Pdf::loadView('pdf.pass_pdf', [
                'member' => $member
            ]);
            Storage::put($pdfPath, $pdf->output());
        }
        return $pdfPath;
    }
}

function getRegID()
{
    $latestID = DB::table('members')->max('reg_id');
    return $latestID ? $latestID + 1 : 100;
}

function emailContent(): array
{
    return [
        'subject' => 'Expression of Interest (EoI) Successfully Submitted',
        'body' => 'Respected Member,<br><br> Thank you for expressing your interest in becoming a member of your desired Standing Committee/Forum.<br><br>
        We will inform you of the committee list after final declaration by the EC, and the list will also be published on the BASIS website.'
    ];
}

function standingCommittee()
{
    return [
        'Digital Marketing',
        'FinTech & Digital Payment',
        'Local Market',
        'Digital Commerce',
        'Start-ups',
        'International Market',
        'Research and Publication',
        'Games, Animation and Graphics',
        'Digital Content Services and TVAS',
        'HR Management',
        'HR Development & IT Training',
        'Digital Security',
        'Member Services & Welfare',
        'Access to Finance & New Investment',
        'Women In IT',
        'Digital Education',
        'Frontier Technology',
        'e-Governance',
        'IPR',
        'Data Center And Cloud',
        'Software Product And SAAS',
        'Geographic Information System & Space',
    ];
}

function forums()
{
    return [
        // 'BASIS Presidents Forum',
        'Infrastructure & Hi-Tech Park Forum',
        'Microprocessor,  Encryption & Quantum Computing Forum',
        'Forum For Especially Abled Persons',
        'Testing & Quality Assurance Forum',
        'BASIS Students Forum',
        'BASIS Japan Desk',
        'BASIS America Desk',
        'BASIS Middle East And Africa Desk',
    ];
}

function logShow($title){
    if($title == 'member_login'){
        $totalLoginMember = Member::count();
        return $totalLoginMember;
    }elseif($title == 'applied'){
        $totalApplied = Priority::count();
        return $totalApplied;
    }elseif($title == 'pending'){
        $totalPending = Priority::where('status','Pending')->count();
        return $totalPending;
    }elseif($title == 'approved'){
        $totalApproved = Priority::where('status','approved')->count();
        return $totalApproved;
    }
}

function committeLog($name = null){
    if(empty($name)){
        $total=Priority::where('priority_type','committe')->count();
        return $total;
    }else{
        $total=Priority::where('priority',$name)->count();
        return $total;
    }
}

function ForumsLog($name = null){
    if(empty($name)){
        $total=Priority::where('priority_type','forum')->count();
        return $total;
    }else{
        $total=Priority::where('priority',$name)->count();
        return $total;
    }
}

function companyLog($name = null){
    $total=Registration::count();
    return $total;
}

function Logo($membership_id ){
    $logo=Member::where('membership_id',$membership_id)->select('logo')->first();
    return $logo->logo;
}

function companyName($membership_id ){
    $company=Member::where('membership_id',$membership_id)->select('company_name')->first();
    return $company->company_name;
}

function perName($membership_id ){
    $company=Member::where('membership_id',$membership_id)->select('name')->first();
    return $company->name;
}

function perDesignation($membership_id ){
    $company=Member::where('membership_id',$membership_id)->select('designation')->first();
    return $company->designation;
}

function perEmail($membership_id ){
    $company=Member::where('membership_id',$membership_id)->select('email')->first();
    return $company->email;
}

function perMobile($membership_id ){
    $company=Member::where('membership_id',$membership_id)->select('mobile')->first();
    return $company->mobile;
}
