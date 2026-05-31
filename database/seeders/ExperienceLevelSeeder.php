<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExperienceLevel;

class ExperienceLevelSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name"=>"No Experience","nameAR"=>"بدون خبرة"],
            ["name"=>"Less than 1 Year","nameAR"=>"أقل من سنة"],
            ["name"=>"1 - 3 Years","nameAR"=>"1 - 3 سنوات"],
            ["name"=>"3 - 5 Years","nameAR"=>"3 - 5 سنوات"],
            ["name"=>"5 - 7 Years","nameAR"=>"5 - 7 سنوات"],
            ["name"=>"7 - 10 Years","nameAR"=>"7 - 10 سنوات"],
            ["name"=>"More than 10 Years","nameAR"=>"أكثر من 10 سنة"],
        ];

        foreach ($types as $type) {
            ExperienceLevel::create([
                'name' => $type['name'],
                'nameAR' => $type['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}