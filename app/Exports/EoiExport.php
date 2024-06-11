<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EoiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Member Id',
            'Company Name',
            'Priority Lable',
            'Priority Type',
            'Priority',
            'Participant Name',
            'Participant Designation',
            'Participant Email',
            'Participant Phone',
            'Participant Facebook_link',
            'Participant LinkedIn_link',
            'Company Address',
            'relevance_to_committee',
            'support_or_improvement',
            'community_or_policy',
            'contribute_hours',
            'attend_monthly_meeting',
            'Submitted Date',
            'Comment',
            'Status',
        ];
    }

    public function map($row): array
    {

        $prioritySupportOrImprovement = json_decode($row['priority_support_or_improvement'], true);
        $prioritySupportOrImprovementText = is_array($prioritySupportOrImprovement) ? implode(', ', $prioritySupportOrImprovement) : '';
        return [
            $row['registration']['membership_id'],
            $row['registration']['company_name'],
            $row['priority_lable'],
            $row['priority_type'],
            $row['priority'],
            $row['par_name'],
            $row['par_designation'],
            $row['par_email'],
            $row['par_phone'],
            $row['registration']['par_facebook_link'],
            $row['registration']['par_linkedIn_link'],
            $row['registration']['company_address'],
            $row['priority_relevance_to_committee'],
            $prioritySupportOrImprovementText,
            $row['priority_community_or_policy'],
            $row['priority_contribute_hours'],
            $row['priority_attend_monthly_meeting'],
            $row['registration']['submitted_date'],
            $row['comment'],
            $row['status']
        ];
    }
}
