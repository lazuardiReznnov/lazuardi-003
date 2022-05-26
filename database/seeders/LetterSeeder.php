<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Letters;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letters::create([
            'unit_id' => 1,
            'type' => 'stnk',
            'owner_name' => 'PT. GEMA CIPTA GEMILANG',
            'owner_add' => 'Kp. Korelet',
            'taxt' => '2022/10/28',
            'reg' => '2022/10/25',
        ]);

        Letters::create([
            'unit_id' => 1,
            'type' => 'KIR',
            'owner_name' => 'PT. GEMA CIPTA GEMILANG',
            'owner_add' => 'Kp. Korelet',
            'taxt' => '2022/10/28',
        ]);
    }
}