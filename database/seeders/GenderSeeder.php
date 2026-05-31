<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    public function run() : void
    {
        $Genders = [
            ["name_en"=>"Male","name"=>"ذكر"],
            ["name_en"=>"Female","name"=>"أنثى"],
        ];

        foreach ($Genders as $Gender) {
            Gender::create([
                'name' => $Gender['name'],
                'name_en' => $Gender['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}