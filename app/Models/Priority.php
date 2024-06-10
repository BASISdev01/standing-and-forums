<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function scopeFilter($query, $request)
    {
        if ($request->input('company_name') != null) {
            $query->whereHas('registration', function ($companyNameQuery) use ($request) {
                $companyNameQuery->where('company_name', 'LIKE', '%' . $request['company_name'] . '%');
            });
        }

        if ($request->input('priority_lable') != null) {
            $query->where('priority_lable', $request->input('priority_lable'));
        }

        if ($request->input('committee') != null) {
            $query->where('priority_type', 'committe');
            $query->where('priority', $request->input('committee'));
        }

        if ($request->input('forum') != null) {
            $query->where('priority_type', 'forum');
            $query->where('priority', $request->input('forum'));
        }

        if ($request->input('year') != null) {
            $query->whereHas('registration', function ($yearQuery) use ($request) {
                $yearQuery->where('year', $request->input('year'));
            });
        }

        if ($request->input('status') != null) {
            $query->where('status', $request->input('status'));
        }else{
            $query->where('status', 'pending');
        }

        return $query;
    }

    public function scopeExportFilter($query, $request)
    {
        if (isset($request['company_name'])) {
            $query->whereHas('registration', function ($companyNameQuery) use ($request) {
                $companyNameQuery->where('company_name', 'LIKE', '%' . $request['company_name'] . '%');
            });
        }

        if (isset($request['priority_lable'])) {
            $query->where('priority_lable', $request['priority_lable']);
        }

        if (isset($request['committee'])) {
            $query->where('priority_type', 'committe');
            $query->where('priority', $request['committee']);
        }

        if (isset($request['forum'])) {
            $query->where('priority_type', 'forum');
            $query->where('priority', $request['forum']);
        }

        if (isset($request['year'])) {
            $query->whereHas('registration', function ($yearQuery) use ($request) {
                $yearQuery->where('year', $request['year']);
            });
        }
        if (isset($request['status'])) {
            $query->where('status', $request['status']);
        }else{
            $query->where('status', 'pending');
        }

        return $query;
    }


    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class,'registration_id','id');
    }

}
