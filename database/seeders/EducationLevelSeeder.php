<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationLevel;

class EducationLevelSeeder extends Seeder
{
    public function run() : void
    {
        $edus = [
            ["name_en"=>"Primary","name"=>"ابتدائي"],
            ["name_en"=>"Intermediate","name"=>"إعدادي"],
            ["name_en"=>"Secondary","name"=>"ثانوي"],
            ["name_en"=>"Diploma","name"=>"دبلوم"],
            ["name_en"=>"Associate Degree","name"=>"درجة الزمالة"],
            ["name_en"=>"Bachelor Degree","name"=>"بكالوريوس"],
            ["name_en"=>"Master Degree","name"=>"ماجستير"],
            ["name_en"=>"PhD","name"=>"دكتوراه"],
            ["name_en"=>"No Education","name"=>"بدون تعليم"],
            ["name_en"=>"Still Studying","name"=>"لا يزال يدرس"]
        ];

        foreach ($edus as $edu) {
            EducationLevel::create([
                'name' => $edu['name'],
                'name_en' => $edu['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}