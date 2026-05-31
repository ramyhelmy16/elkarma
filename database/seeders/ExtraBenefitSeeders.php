<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExtraBenefits;

class ExtraBenefitSeeders extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name"=>"Annual Bonus","nameAR"=>"مكافأة سنوية"],
            ["name"=>"Awards Program","nameAR"=>"برنامج الجوائز"],
            ["name"=>"Paid Vacation","nameAR"=>"إجازة سنوية مدفوعة الأجر"],
            ["name"=>"Performance Bonus","nameAR"=>"مكافأة الأداء"],
            ["name"=>"Flexible Hours","nameAR"=>"ساعات عمل مرنة"],
            ["name"=>"Remote Work","nameAR"=>"العمل من المنزل"],
            ["name"=>"Professional Training","nameAR"=>"تدريب مهني"],
            ["name"=>"Housing Allowance","nameAR"=>"بدل السكن"],
            ["name"=>"Company Car","nameAR"=>"سيارة الشركة"],
            ["name"=>"Transportation Allowance","nameAR"=>"بدل مواصلات"],
            ["name"=>"Travel Allowance","nameAR"=>"بدل سفر"],
            ["name"=>"Meal Allowance","nameAR"=>"بدل وجبات"],
            ["name"=>"Company Events","nameAR"=>"فعاليات الشركة"],
            ["name"=>"On-Site Daycare","nameAR"=>"حضانة في موقع العمل"],
        ];

        foreach ($types as $type) {
            ExtraBenefits::create([
                'name' => $type['name'],
                'nameAR' => $type['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}