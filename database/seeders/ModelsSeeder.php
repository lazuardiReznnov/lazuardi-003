<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Models::create([
            'brand_id' => 1,
            'name' => 'Dutro 110HD',
            'slug' => 'dutro-110hd',
        ]);

        Models::create([
            'brand_id' => 1,
            'name' => 'Dutro 130HD',
            'slug' => 'dutro-130hd',
        ]);
        Models::create([
            'brand_id' => 1,
            'name' => 'Dutro 130HD Long',
            'slug' => 'dutro-130hdl',
        ]);
    }
}
