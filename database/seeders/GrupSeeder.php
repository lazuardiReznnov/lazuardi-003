<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grup;

class GrupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grup::create([
            'name' => 'Cikande',
            'slug' => 'hebel',
        ]);

        Grup::create([
            'name' => 'Kuningan',
            'slug' => 'git',
        ]);

        Grup::create([
            'name' => 'citeurep',
            'slug' => 'sqa',
        ]);
    }
}
