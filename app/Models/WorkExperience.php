<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'applicant_id',
        'company',
        'job_title_id',
        'start_date',
        'end_date',
        'currently_working',
        'description'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }
}
