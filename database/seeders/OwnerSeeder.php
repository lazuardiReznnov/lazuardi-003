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

        Owner::create([
            'name' => 'PT. Gema Sinar Gemilang',
            'slug' => 'gsg',
            'address' => 'address',
            'email' => 'gemasinargemilang@gmail.com',
            'phone' => '021',
            'img' => 'null',
        ]);

        Owner::create([
            'name' => 'PT. Gema Berkat Gemilang',
            'slug' => 'gbg',
            'address' => 'address',
            'email' => 'gemaberkatgemilang@gmail.com',
            'phone' => '021',
            'img' => 'null',
        ]);

        Owner::create([
            'name' => 'PT. Triraksa Jaya Mandiri',
            'slug' => 'tjm',
            'address' => 'address',
            'email' => 'triraksajayamandiri@gmail.com',
            'phone' => '021',
            'img' => 'null',
        ]);

        Owner::create([
            'name' => 'PT. Setia Pratama Logistik',
            'slug' => 'spl',
            'address' => 'address',
            'email' => 'setiapratamalogistik@gmail.com',
            'phone' => '021',
            'img' => 'null',
        ]);
    }
}