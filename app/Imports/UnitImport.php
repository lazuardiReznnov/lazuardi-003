<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Unit([
            'type_id' => $row[0],
            'owner_id' => $row[1],
            'models_id' => $row[2],
            'NoReg' => $row[3],
            'Slug' => $row[4],
            'vin' => $row[5],
            'enginNumber' => $row[6],
            'year' => $row[7],
            'color' => $row[8],
        ]);
    }
}
