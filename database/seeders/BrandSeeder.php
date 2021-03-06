<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::Create([
            'name' => 'Hino',
            'slug' => 'hino',
        ]);

        Brand::Create([
            'name' => 'Mistubishi',
            'slug' => 'mistsubishi',
        ]);

        Brand::Create([
            'name' => 'All',
            'slug' => 'all',
        ]);
    }
}