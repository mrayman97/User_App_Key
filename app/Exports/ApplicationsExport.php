<?php

namespace App\Exports;

use App\ApplicationModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ApplicationModel::all();
    }
}
