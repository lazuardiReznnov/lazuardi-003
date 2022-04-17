<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
            'name' => 'PT. Gema Cipta Gemilang',
            'slug' => 'gcg',
            'address' => 'address',
            'email' => 'gemaciptagemilang@gmail.com',
            'phone' => '021',
            'img' => 'null',
        ]);
    }
}
