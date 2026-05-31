<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationLevel;

class EducationLevelSeeder extends Seeder
{
    public function run() : void
    {
        $edus = [
            ["name"=>"Primary","nameAR"=>"ابتدائي"],
            ["name"=>"Intermediate","nameAR"=>"إعدادي"],
            ["name"=>"Secondary","nameAR"=>"ثانوي"],
            ["name"=>"Diploma","nameAR"=>"دبلوم"],
            ["name"=>"Associate Degree","nameAR"=>"درجة الزمالة"],
            ["name"=>"Bachelor Degree","nameAR"=>"بكالوريوس"],
            ["name"=>"Master Degree","nameAR"=>"ماجستير"],
            ["name"=>"PhD","nameAR"=>"دكتوراه"],
            ["name"=>"No Education","nameAR"=>"بدون تعليم"],
            ["name"=>"Still Studying","nameAR"=>"لا يزال يدرس"]
        ];

        foreach ($edus as $edu) {
            EducationLevel::create([
                'name' => $edu['name'],
                'nameAR' => $edu['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}