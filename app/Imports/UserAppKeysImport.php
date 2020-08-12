<?php

namespace App\Imports;

use App\UserAppKeyModel;
use Maatwebsite\Excel\Concerns\ToModel;

class UserAppKeysImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserAppKeyModel([
            'app_id' => $row['app_id'],
            'key' => $row['key'],
            'email' => $row['email'],
            'type' => $row['type'],
        ]);
    }
}
