<?php

namespace App\Imports;

use App\Models\Models;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModelsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Models([
            'brand_id' => $row['brand'],
            'name'=> $row['name'],
            'slug'=>$row['slug']
        ]);
    }
}
