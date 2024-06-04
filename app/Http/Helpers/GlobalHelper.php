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
        'BASIS Presidents Forum',
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
