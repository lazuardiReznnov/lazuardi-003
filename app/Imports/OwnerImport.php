<?php

namespace App\Imports;

use App\Models\Owner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OwnerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Owner([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'address' => $row['address'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }
}
