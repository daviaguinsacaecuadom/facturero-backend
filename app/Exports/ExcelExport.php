<?php

namespace App\Exports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Excel::all();
        return Excel::get(['name', 'precie', 'status', 'type']);
    }

    public function headings():array{
        return['Nombre','Precio','Estado','Tipo'];
    }
}
