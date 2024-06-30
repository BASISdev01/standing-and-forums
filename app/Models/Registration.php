<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "registration";

    protected $fillable = [
        'membership_id',
        'par_facebook_link',
        'par_linkedIn_link',
        'company_name',
        'company_address',
        'is_agree',
        'year',
        'submitted_date'
    ];

    public function priority(): HasMany
    {
        return $this->hasMany(Priority::class, 'registration_id', 'id');
    }
}
