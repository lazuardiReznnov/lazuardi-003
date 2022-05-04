<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'type_id' => 3,
            'owner_id' => 1,
            'models_id' => 1,
            'grup_id' => 1,
            'noReg' => 'A 9267 ZA',
            'slug' => 'a-9267-za',
            'vin' => 'MRDS',
            'engineNum' => 'DDBS',
            'year' => '2019',
            'color' => 'Green',
        ]);
        Unit::create([
            'type_id' => 3,
            'owner_id' => 1,
            'models_id' => 1,
            'grup_id' => 1,
            'noReg' => 'A 9266 ZA',
            'slug' => 'a-9266-za',
            'vin' => 'MRDS',
            'engineNum' => 'DDBS',
            'year' => '2019',
            'color' => 'Green',
        ]);
        Unit::create([
            'type_id' => 3,
            'owner_id' => 1,
            'models_id' => 1,
            'grup_id' => 1,
            'noReg' => 'A 9268 ZA',
            'slug' => 'a-9268-za',
            'vin' => 'MRDS',
            'engineNum' => 'DDBS',
            'year' => '2019',
            'color' => 'Green',
        ]);
    }
}