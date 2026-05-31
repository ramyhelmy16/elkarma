<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceType;

class InsuranceTypeSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ["name"=>"Health Insurance","nameAR"=>"تأمين صحى"],
            ["name"=>"Social Insurance","nameAR"=>"تأمين أجتماعي"],
            ["name"=>"Health Social Insurance","nameAR"=>"تأمين صحي أجتماعي"],
            ["name"=>"Medical Insurance","nameAR"=>"تأمين طبي"],
            ["name"=>"Life Insurance","nameAR"=>"تأمين على الحياة"],
        ];

        foreach ($types as $type) {
            InsuranceType::create([
                'name' => $type['name'],
                'nameAR' => $type['nameAR'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}