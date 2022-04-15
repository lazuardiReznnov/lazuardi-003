<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        type::create([
            'title' => 'Pick Up',
            'slug' => 'pick-up',
        ]);

        type::create([
            'title' => 'Colt Diesel Engkel',
            'slug' => 'colt-diesel-engkel',
        ]);
        type::create([
            'title' => 'Colt Diesel Double',
            'slug' => 'colt-diesel-double',
        ]);
    }
}
