<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Qualification extends Model
{
    protected $fillable = ['name', 'name_en'];

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }

    public function getTranslatedNameAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? $this->name 
            : ($this->name_en ?? $this->name);
    }
}
