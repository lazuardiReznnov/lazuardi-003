<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Unit([
            'type_id' => $row['type'],
            'owner_id' => $row['owner'],
            'models_id' => $row['models'],
            'grup_id' => $row['grup'],
            'noReg' => $row['pol'],
            'slug' => $row['slug'],
            'vin' => $row['vin'],
            'engineNum' => $row['en'],
            'year' => $row['year'],
            'color' => $row['col'],
            // 'type_id' => $row[0],
            // 'owner_id' => $row[1],
            // 'models_id' => $row[2],
            // 'grup_id' => $row[3],
            // 'noReg' => $row[4],
            // 'Slug' => $row[5],
            // 'vin' => $row[6],
            // 'enginNumber' => $row[7],
            // 'year' => $row[8],
            // 'color' => $row[9],
        ]);
    }
}
