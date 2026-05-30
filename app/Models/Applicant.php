<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'nid',
        'telephone',
        'email',
        'dob',
        'education_level_id',
        'qualification_id',
        'gender_id',
        'field_of_study',
        'graduation_year',
        'address',
        'area_id',
        'nid_image',
        'client_image',
        'resume',
    ];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
