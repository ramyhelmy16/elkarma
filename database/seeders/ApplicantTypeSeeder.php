<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicantType;

class ApplicantTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name_en"=>"Male","name"=>"ذكر"],
            ["name_en"=>"Female","name"=>"أنثى"],
            ["name_en"=>"Both","name"=>"كلاهما"],
        ];

        foreach ($types as $type) {
            ApplicantType::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}