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
            'analysis' => 'Service Berkala, Cek Rem, Cek Roda RR RH ',
            'problem' =>
                'Mobil Brebet, Rem Ngebuang Kekanan, Roda RR RH Keluar Oli',
            'mechanic' => 'Ali',
            'estimasi' => 1,
            'status' => 25,
        ]);
        Maintenance::create([
            'unit_id' => 2,
            'date' => '2022/05/03',
            'analysis' => 'Service Berkala. Cek Kelistrikan ',
            'problem' => 'Oli Tekor,  Sein LH Mati ',
            'mechanic' => 'Nurdin',
            'estimasi' => 1,
            'Status' => 50,
        ]);
        Maintenance::create([
            'unit_id' => 3,
            'date' => '2022/05/05',
            'analysis' => 'Cek Roda FR ',
            'problem' => 'Roda FR LH Kemakan Sebelah ',
            'mechanic' => 'Tardi',
            'estimasi' => 1,
            'Status' => 75,
        ]);
    }
}
