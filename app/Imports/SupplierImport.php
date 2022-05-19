<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Supplier([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'telp' => $row['telp'],
            'address' => $row['address'],
            'email' => $row['email'],
        ]);
    }
}
