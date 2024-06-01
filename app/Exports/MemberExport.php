<?php

namespace App\Exports;


use App\AppConstant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $members;

    public function __construct($members)
    {
        $this->members = $members;
    }

    public function collection()
    {
        return $this->members->map(function ($member) {
            return [
                'reg_id' => $member->reg_id,
                'company_name' => $member->company_name,
                'name' => $member->name,
                'mobile' => $member->mobile,
                'email' => $member->email,
                'auth_rep' => AppConstant::getTypes()[$member->auth_rep],
                'is_entry' => $member->is_entry ? 'YES' : 'NO',
                'is_manual' => $member->is_manual === 1 ? 'Manual' : 'Self',
                'created_at' => date('d-F-Y', strtotime($member->created_at)),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Registration ID',
            'Company Name',
            'Participant Name',
            'Mobile',
            'Email',
            'Type',
            'Is Entry',
            'Registration Type',
            'Created At',
        ];
    }
}
