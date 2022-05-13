<?php

namespace App\Imports;

use App\Models\sparepart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class sparepartImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sparepart([
            'categorie_id' => $row['categorie'],
            'models_id' => $row['models_id'],
            'name' => $row['name'],
            'merk' => $row['merk'],
            'slug' => $row['slug'],
            'codePart' => $row['cd'],
            'qty' => $row['qty'],
        ]);
    }
}
