<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        'subject' => 'Registration Confirmation for BASIS 25-Year Celebration',
        'body' => 'Respected Guest,<br><br> Your registration for the BASIS 25-Year Celebration event is confirmed.<br><br> Your registration CODE is <strong>{{code}}.</strong><br><p>We cordially invite you to join us at this memorable occasion, scheduled for  <strong>Saturday, February 17, 2024,</strong> at <strong>4:00 pm</strong>. The celebration will take place at <strong><a href="https://maps.app.goo.gl/Gec8P22cnK8fzzSeA" target="_blank">Greenville Outdoors</a></strong>, Madani Ave, 100 Feet, Dhaka.
</p><p>Please present your entry pass at the venue\'s welcome desk to get entry. Kindly note that this entry pass is not transferable.</p><p>For any queries or assistance, feel free to contact us dialing <strong>16488</strong>. We look forward to celebrating this important milestone of BASIS and IT industry with you.</p><br>Warm Regards,<br><br><strong>Samira Zuberi Himika</strong><br>
Senior Vice President, BASIS<br>
(Convener, BASIS 25-Year Celebration)'
    ];
}

function standingCommittee(){
    return [
        '4IR',
        'Access to Finance & New Investment',
        'Data Center and cloud',
        'Digital Commerce',
        'Digital Content Services and TVAS',
        'Digital Education',
        'Digital Marketing',
        'Digital Security',
        'eGov',
        'FinTech & Digital Payment',
        'Games, XR, NFT, Animation and Graphics',
        'HR Development & IT Training',
        'HR Management',
        'International Market Development',
        'IPR',
        'Local Market',
        'Member Services & Welfare',
        'Research and Publication',
        'Software product and SAAS',
        'Start-ups',
        'Women in IT'
    ];
}

function forums(){
    return [
        'BASIS America Desk',
        'BASIS Japan and Korea Desk',
        'BASIS Middle East and Africa Desk',
        'BASIS Presidents’ Forum',
        'BASIS Students Forum',
        'Forum for especially abled persons',
        'Infrastructure & Hi-Tech Park Forum',
        'Quantum Safe Bangladesh',
        'System Integration Forum',
        'Testing & Quality Assurance Forum'
    ];
}
