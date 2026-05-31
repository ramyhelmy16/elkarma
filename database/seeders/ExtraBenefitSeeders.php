<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExtraBenefits;

class ExtraBenefitSeeders extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name_en"=>"Annual Bonus","name"=>"مكافأة سنوية"],
            ["name_en"=>"Awards Program","name"=>"برنامج الجوائز"],
            ["name_en"=>"Paid Vacation","name"=>"إجازة سنوية مدفوعة الأجر"],
            ["name_en"=>"Performance Bonus","name"=>"مكافأة الأداء"],
            ["name_en"=>"Flexible Hours","name"=>"ساعات عمل مرنة"],
            ["name_en"=>"Remote Work","name"=>"العمل من المنزل"],
            ["name_en"=>"Professional Training","name"=>"تدريب مهني"],
            ["name_en"=>"Housing Allowance","name"=>"بدل السكن"],
            ["name_en"=>"Company Car","name"=>"سيارة الشركة"],
            ["name_en"=>"Transportation Allowance","name"=>"بدل مواصلات"],
            ["name_en"=>"Travel Allowance","name"=>"بدل سفر"],
            ["name_en"=>"Meal Allowance","name"=>"بدل وجبات"],
            ["name_en"=>"Company Events","name"=>"فعاليات الشركة"],
            ["name_en"=>"On-Site Daycare","name"=>"حضانة في موقع العمل"],
        ];

        foreach ($types as $type) {
            ExtraBenefits::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}