<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExperienceLevel;

class ExperienceLevelSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name_en"=>"No Experience","name"=>"بدون خبرة"],
            ["name_en"=>"Less than 1 Year","name"=>"أقل من سنة"],
            ["name_en"=>"1 - 3 Years","name"=>"1 - 3 سنوات"],
            ["name_en"=>"3 - 5 Years","name"=>"3 - 5 سنوات"],
            ["name_en"=>"5 - 7 Years","name"=>"5 - 7 سنوات"],
            ["name_en"=>"7 - 10 Years","name"=>"7 - 10 سنوات"],
            ["name_en"=>"More than 10 Years","name"=>"أكثر من 10 سنة"],
        ];

        foreach ($types as $type) {
            ExperienceLevel::create([
                'name_en' => $type['name_en'],
                'name' => $type['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}