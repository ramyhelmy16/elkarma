<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name"=>"Full-time","nameAR"=>"دوام كامل"],
            ["name"=>"Part-time","nameAR"=>"دوام جزئي"],
            ["name"=>"Contract","nameAR"=>"عقد محدد"],
            ["name"=>"Temporary","nameAR"=>"مؤقت"],
            ["name"=>"freelance","nameAR"=>"عمل حر"],
            ["name"=>"seasonal","nameAR"=>"موسمي"],
            ["name"=>"Internship","nameAR"=>"تدريب"],
            ["name"=>"Apprenticeship","nameAR"=>"تمهين"],
        ];

        foreach ($types as $type) {
            JobType::create([
                'name' => $type['name'],
                'nameAR' => $type['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}