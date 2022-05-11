<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            PartTenanceSeeder::class,
            GrupSeeder::class,
        ]);

        // Owner::factory(5)->create();
    }
}
