<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qualification;

class QualificationSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ['name' => 'بدون مؤهل', 'name_en' => 'No Formal Qualification'],
            ['name' => 'محو أمية', 'name_en' => 'Literacy Certificate'],
            ['name' => 'ابتدائي', 'name_en' => 'Primary School Certificate'],
            ['name' => 'إعدادي', 'name_en' => 'Preparatory School Certificate'],
            ['name' => 'ثانوية عامة', 'name_en' => 'General Secondary Certificate'],
            ['name' => 'ثانوية فنية صناعية', 'name_en' => 'Industrial Secondary Diploma'],
            ['name' => 'ثانوية فنية تجارية', 'name_en' => 'Commercial Secondary Diploma'],
            ['name' => 'ثانوية فنية زراعية', 'name_en' => 'Agricultural Secondary Diploma'],
            ['name' => 'ثانوية فندقية', 'name_en' => 'Hotel Secondary Diploma'],

            ['name' => 'دبلوم مهني', 'name_en' => 'Vocational Diploma'],
            ['name' => 'دبلوم فني', 'name_en' => 'Technical Diploma'],
            ['name' => 'دبلوم سنتين', 'name_en' => 'Two-Year Diploma'],
            ['name' => 'دبلوم ثلاث سنوات', 'name_en' => 'Three-Year Diploma'],
            ['name' => 'دبلوم خمس سنوات', 'name_en' => 'Five-Year Diploma'],

            ['name' => 'دبلوم عالي', 'name_en' => 'Higher Diploma'],
            ['name' => 'دبلوم دراسات عليا', 'name_en' => 'Postgraduate Diploma'],

            ['name' => 'درجة الزمالة', 'name_en' => 'Associate Degree'],
            ['name' => 'بكالوريوس', 'name_en' => "Bachelor's Degree"],
            ['name' => 'بكالوريوس طب', 'name_en' => 'Bachelor of Medicine'],
            ['name' => 'بكالوريوس صيدلة', 'name_en' => 'Bachelor of Pharmacy'],
            ['name' => 'بكالوريوس هندسة', 'name_en' => 'Bachelor of Engineering (BEng)'],
            ['name' => 'بكالوريوس علوم', 'name_en' => 'Bachelor of Science (BSc)'],
            ['name' => 'بكالوريوس حاسبات ومعلومات', 'name_en' => 'Bachelor of Computer Science'],
            ['name' => 'بكالوريوس تجارة', 'name_en' => 'Bachelor of Commerce (BCom)'],
            ['name' => 'ليسانس آداب', 'name_en' => 'Bachelor of Arts (BA)'],
            ['name' => 'بكالوريوس حقوق', 'name_en' => 'Bachelor of Law (LLB)'],
            ['name' => 'بكالوريوس تمريض', 'name_en' => 'Bachelor of Nursing'],

            ['name' => 'ماجستير', 'name_en' => "Master's Degree"],
            ['name' => 'ماجستير هندسة', 'name_en' => 'Master of Engineering (MEng)'],
            ['name' => 'ماجستير علوم', 'name_en' => 'Master of Science (MSc)'],
            ['name' => 'ماجستير آداب', 'name_en' => 'Master of Arts (MA)'],
            ['name' => 'ماجستير إدارة أعمال', 'name_en' => 'Master of Business Administration (MBA)'],

            ['name' => 'دكتوراه', 'name_en' => 'Doctorate (PhD)'],
            ['name' => 'دكتوراه فلسفة', 'name_en' => 'Doctor of Philosophy (PhD)'],
            ['name' => 'دكتوراه مهنية', 'name_en' => 'Professional Doctorate'],

            ['name' => 'زمالة', 'name_en' => 'Fellowship'],
            ['name' => 'بورد طبي', 'name_en' => 'Medical Board Certification'],
            ['name' => 'شهادة تخصص', 'name_en' => 'Specialization Certificate'],
            ['name' => 'شهادة مهنية', 'name_en' => 'Professional Certification'],
        ];

        foreach ($types as $type) {
            Qualification::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}