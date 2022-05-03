<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maintenance;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::create([
            'unit_id' => 1,
            'date' => '2022/05/04',
            'analysis' => 'Cek Rem',
            'problem' => 'Rem Blong',
            'mechanic' => 'Ali',
        ]);
        Maintenance::create([
            'unit_id' => 2,
            'date' => '2022/05/03',
            'analysis' => 'Cek Kelistrikan',
            'problem' => 'Lampu Depan Mati',
            'mechanic' => 'Nurdin',
        ]);
        Maintenance::create([
            'unit_id' => 3,
            'date' => '2022/05/05',
            'analysis' => 'Cek Kopling',
            'problem' => 'Gigi 3 tidak bisa Masuk',
            'mechanic' => 'Tardi',
        ]);
    }
}