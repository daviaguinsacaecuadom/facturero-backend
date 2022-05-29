<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExcelImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $numRows = 0;

    public function model(array $row)
    {
        ++$this->numRows;
        return new Excel([
            'name'=> $row['nombre'],
            'precie'=> $row['precio'],
            'status'=>$row['estado'],
            'type'=>$row['tipo']

        ]);
    }

    public function rules(): array
    {
        return [
            // 'name' => 'required|max:45',
            // 'price' => 'required|max:45',
            // 'status' => 'required',
            // 'type' => 'required',
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
