<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $fillable = [
        'job_title_id',
        'company_id',
        'description',
        'requirements',
        'education_level_id',
        'experience_level_id',
        'qualification_id',
        'job_type_id',
        'insurance_type_id',
        'extra_benefit_id',
        'salary_min',
        'salary_max',
        'application_deadline',
        'expected_start_date',
        'working_hours',
        'vacation_days',
        'incentives',
        'applicant_type_id',
        'gender_id',
        'age_min',
        'age_max',
        'required_languages',
        'required_skills',
        'extra_info',
        'area_id',
        'is_active'
    ];

    protected $casts = [
        'application_deadline' => 'date',
        'expected_start_date' => 'date',
        'incentives' => 'boolean',
        'is_active' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function experienceLevel()
    {
        return $this->belongsTo(ExperienceLevel::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function insuranceType()
    {
        return $this->belongsTo(InsuranceType::class);
    }

    public function extraBenefits()
    {
        return $this->belongsTo(ExtraBenefits::class, 'extra_benefit_id');
    }

    public function applicantType()
    {
        return $this->belongsTo(ApplicantType::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getTitleAttribute(): string
    {
        return $this->jobTitle->name;
    }

    public function getCompanyNameAttribute()
    {
        return $this->company->name;
    }

    public function getAreAttributeAttribute()
    {
        return $this->area->name;
    }
}
