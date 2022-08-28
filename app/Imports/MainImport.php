<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MainImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Distrito_Federal' => new ZipcodesImport()
        ];
    }

}
