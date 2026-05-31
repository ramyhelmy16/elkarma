<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceType;

class InsuranceTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name_en"=>"Health Insurance","name"=>"تأمين صحى"],
            ["name_en"=>"Social Insurance","name"=>"تأمين أجتماعي"],
            ["name_en"=>"Health Social Insurance","name"=>"تأمين صحي أجتماعي"],
            ["name_en"=>"Medical Insurance","name"=>"تأمين طبي"],
            ["name_en"=>"Life Insurance","name"=>"تأمين على الحياة"],
        ];

        foreach ($types as $type) {
            InsuranceType::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}