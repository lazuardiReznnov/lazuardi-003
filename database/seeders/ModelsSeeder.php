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
        Models::create([
            'brand_id' => 2,
            'name' => 'Canter 125 Super Speed',
            'slug' => 'canter-125-super-speed',
        ]);

        Models::create([
            'brand_id' => 3,
            'name' => 'Universal',
            'slug' => 'universal',
        ]);
        Models::create([
            'brand_id' => 1,
            'name' => 'Dutro 130MD Long',
            'slug' => 'dutro-130md-long',
        ]);
        Models::create([
            'brand_id' => 1,
            'name' => 'Ranger FG 8 JS',
            'slug' => 'ranger fg-8-js',
        ]);
        Models::create([
            'brand_id' => 1,
            'name' => 'Ranger FL 8 JW',
            'slug' => 'ranger fL-8-jW',
        ]);
    }
}