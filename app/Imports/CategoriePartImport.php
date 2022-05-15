<?php

namespace App\Imports;

use App\Models\CategoriePart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriePartImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CategoriePart([
            'name' => $row['name'],
            'slug' => $row['slug'],
        ]);
    }
}
