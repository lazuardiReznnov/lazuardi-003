<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriePart;

class CategoriePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriePart::create([
            'name' => 'Fuel System',
            'slug' => 'fuel-system',
        ]);

        CategoriePart::create([
            'name' => 'Ignation System',
            'slug' => 'ignation-system',
        ]);

        CategoriePart::create([
            'name' => 'Cooling System',
            'slug' => 'cooling-system',
        ]);

        CategoriePart::create([
            'name' => 'Lubricating System',
            'slug' => 'lubricating-system',
        ]);

        CategoriePart::create([
            'name' => 'Transmission System',
            'slug' => 'transmission-system',
        ]);

        CategoriePart::create([
            'name' => 'Drive Train',
            'slug' => 'drive-train',
        ]);

        CategoriePart::create([
            'name' => 'Electrical System',
            'slug' => 'electrical-system',
        ]);

        CategoriePart::create([
            'name' => 'Brake System',
            'slug' => 'brake-system',
        ]);

        CategoriePart::create([
            'name' => 'Body',
            'slug' => 'body',
        ]);
    }
}