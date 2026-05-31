<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    public function run() : void
    {
        $Genders = [
            ["name"=>"Male","nameAR"=>"ذكر"],
            ["name"=>"Female","nameAR"=>"أنثى"],
        ];

        foreach ($Genders as $Gender) {
            Gender::create([
                'name' => $Gender['name'],
                'nameAR' => $Gender['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}