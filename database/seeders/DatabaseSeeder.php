<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grup;
use App\Models\Owner;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            TypeSeeder::class,
            BrandSeeder::class,
            ModelsSeeder::class,
            UnitSeeder::class,
            OwnerSeeder::class,
            CategoriePartSeeder::class,
            SparepartSeeder::class,
            MaintenanceSeeder::class,
        ]);

        Grup::create([
            'name' => 'Gema Cipta Gemilang',
            'slug' => 'gcg',
        ]);

        Grup::create([
            'name' => 'Gema Berkat Gemilang',
            'slug' => 'gbg',
        ]);

        Grup::create([
            'name' => 'Gema Sinar Gemilang',
            'slug' => 'gsg',
        ]);

        Grup::create([
            'name' => 'Triraksa Jaya Mandiri',
            'slug' => 'tjm',
        ]);
        Grup::create([
            'name' => 'Setia Pratama Logistic',
            'slug' => 'spl',
        ]);
        // Owner::factory(5)->create();
    }
}