<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'name',
        'nameAR'
    ];


    public function getTranslatedNameAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? ($this->nameAR ?? $this->name)
            : $this->name;
    }
}
