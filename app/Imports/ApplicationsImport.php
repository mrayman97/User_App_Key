<?php

namespace App\Imports;

use App\ApplicationModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicationModel([
            'app_id' => $row['app_id'],
            'name' => $row['name'],
            'logo' => $row['logo'],
            'description' => $row['description']
        ]);
    }
}
