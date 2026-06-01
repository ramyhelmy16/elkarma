<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraBenefits extends Model
{
    protected $fillable = [
        'name',
        'name_en'
    ];

    
    public function getTranslatedNameAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? $this->name 
            : ($this->name_en ?? $this->name);
    }
}
