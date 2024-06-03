<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "priority";

    protected $fillable = [
        'registration_id',
        'priority_lable',
        'priority',
        'priority_type',
        'par_name',
        'par_designation',
        'par_email',
        'par_phone',
        'priority_relevance_to_committee',
        'priority_support_or_improvement',
        'priority_identified_gaps',
        'priority_three_collaborates',
        'priority_community_or_policy',
        'priority_contribute_hours',
        'priority_attend_monthly_meeting',
        'approved_date',
        'approved_by',
        'comment',
        'status'
    ];
}
