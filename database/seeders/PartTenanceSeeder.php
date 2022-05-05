<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PartTenance;

class PartTenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartTenance::create([
            'maintenance_id' => 1,
            'sparepart_id' => 1,
            'qty' => 1,
        ]);
        PartTenance::create([
            'maintenance_id' => 1,
            'sparepart_id' => 2,
            'qty' => 1,
        ]);
        PartTenance::create([
            'maintenance_id' => 2,
            'sparepart_id' => 2,
            'qty' => 1,
        ]);
        PartTenance::create([
            'maintenance_id' => 3,
            'sparepart_id' => 1,
            'qty' => 1,
        ]);
    }
}