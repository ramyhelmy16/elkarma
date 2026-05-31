<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name_en"=>"Full-time","name"=>"دوام كامل"],
            ["name_en"=>"Part-time","name"=>"دوام جزئي"],
            ["name_en"=>"Contract","name"=>"عقد محدد"],
            ["name_en"=>"Temporary","name"=>"مؤقت"],
            ["name_en"=>"freelance","name"=>"عمل حر"],
            ["name_en"=>"seasonal","name"=>"موسمي"],
            ["name_en"=>"Internship","name"=>"تدريب"],
            ["name_en"=>"Apprenticeship","name"=>"تمهين"],
        ];

        foreach ($types as $type) {
            JobType::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}