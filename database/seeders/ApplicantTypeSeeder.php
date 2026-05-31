<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicantType;

class ApplicantTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name"=>"Male","nameAR"=>"ذكر"],
            ["name"=>"Female","nameAR"=>"أنثى"],
            ["name"=>"Both","nameAR"=>"كلاهما"],
        ];

        foreach ($types as $type) {
            ApplicantType::create([
                'name' => $type['name'],
                'nameAR' => $type['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}