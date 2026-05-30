<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'contact_person', 'description', 'website', 'logo_path', 'tax_id', 'registration_number', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
