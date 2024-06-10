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
            'priority_id',
            'registration_id',
            'company_name',
            'member_id',
            'priority_lable',
            'priority_type',
            'priority',
            'par_name',
            'par_designation',
            'par_email',
            'par_phone',
            'par_facebook_link',
            'par_linkedIn_link',
            'company_address',
            'priority_relevance_to_committee',
            'priority_support_or_improvement',
            'priority_community_or_policy',
            'priority_contribute_hours',
            'priority_attend_monthly_meeting',
            'year',
            'submitted_date',
            'is_agree',
            'approved_date',
            'comment',
            'status',
        ];
    }

    public function map($row): array
    {

        $prioritySupportOrImprovement = json_decode($row['priority_support_or_improvement'], true);
        $prioritySupportOrImprovementText = is_array($prioritySupportOrImprovement) ? implode(', ', $prioritySupportOrImprovement) : '';
        return [
            $row['id'],
            $row['registration']['id'],
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
            $row['registration']['year'],
            $row['registration']['submitted_date'],
            $row['registration']['is_agree'],
            $row['approved_date'],
            $row['comment'],
            $row['status']
        ];
    }
}
