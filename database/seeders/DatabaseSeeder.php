<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            ApplicantTypeSeeder::class, 
            EducationLevelSeeder::class,
            JobTypeSeeder::class,
            InsuranceTypeSeeder::class,
            ExperienceLevelSeeder::class,
            ExtraBenefitSeeders::class,
            JobTitleSeeder::class, 
            ShieldSeeder::class,
            UserSeeder::class,
        ]);
    }
}
