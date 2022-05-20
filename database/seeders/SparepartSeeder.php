<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sparepart;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sparepart::create([
            'categorie_id' => '4',
            'models_id' => '5',
            'name' => 'Mediteran SC',
            'merk' => 'Pertamina',
            'slug' => 'mediteran-sc',
            'codePart' => '0000-0000',
            'qty' => '0',
        ]);

        sparepart::create([
            'categorie_id' => '1',
            'models_id' => '2',
            'name' => 'Upper Fuel Filter',
            'merk' => 'NN',
            'slug' => 'upper-fuel-filter',
            'codePart' => '0000-0000',
            'qty' => '0',
        ]);

        sparepart::create([
            'categorie_id' => '1',
            'models_id' => '2',
            'name' => 'Bottom fuel filter',
            'merk' => 'NN',
            'slug' => 'bottom-fuel-filter',
            'codePart' => '0000-0000',
            'qty' => '0',
        ]);
    }
}