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
            'analysis' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'problem' => 'R Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'mechanic' => 'Ali',
        ]);
        Maintenance::create([
            'unit_id' => 2,
            'date' => '2022/05/03',
            'analysis' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'problem' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'mechanic' => 'Nurdin',
        ]);
        Maintenance::create([
            'unit_id' => 3,
            'date' => '2022/05/05',
            'analysis' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'problem' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
            quisquam placeat quasi! Itaque, perspiciatis possimus!',
            'mechanic' => 'Tardi',
        ]);
    }
}