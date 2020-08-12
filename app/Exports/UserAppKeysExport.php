<?php

namespace App\Exports;

use App\UserAppKeyModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserAppKeysExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserAppKeyModel::all();
    }
}
