<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MainImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Aguascalientes' => new ZipcodesImport(),
            'Baja_California' => new ZipcodesImport(),
            'Baja_California_Sur' => new ZipcodesImport(),
            'Campeche' => new ZipcodesImport(),
            'Coahuila_de_Zaragoza' => new ZipcodesImport(),
            'Colima' => new ZipcodesImport(),
            'Chiapas' => new ZipcodesImport(),
            'Chihuahua' => new ZipcodesImport(),
            'Distrito_Federal' => new ZipcodesImport(),
            'Durango' => new ZipcodesImport(),
            'Guanajuato' => new ZipcodesImport(),
            'Guerrero' => new ZipcodesImport(),
            'Hidalgo' => new ZipcodesImport(),
            'Jalisco' => new ZipcodesImport(),
            'México' => new ZipcodesImport(),
            'Michoacán_de_Ocampo' => new ZipcodesImport(),
            'Morelos' => new ZipcodesImport(),
            'Nayarit' => new ZipcodesImport(),
            'Nuevo_León' => new ZipcodesImport(),
            'Oaxaca' => new ZipcodesImport(),
            'Puebla' => new ZipcodesImport(),
            'Querétaro' => new ZipcodesImport(),
            'Quintana_Roo' => new ZipcodesImport(),
            'San_Luis_Potosí' => new ZipcodesImport(),
            'Sinaloa' => new ZipcodesImport(),
            'Sonora' => new ZipcodesImport(),
            'Tabasco' => new ZipcodesImport(),
            'Tamaulipas' => new ZipcodesImport(),
            'Tlaxcala' => new ZipcodesImport(),
            'Veracruz_de_Ignacio_de_la_Llave' => new ZipcodesImport(),
            'Yucatán' => new ZipcodesImport(),
            'Zacatecas' => new ZipcodesImport()
        ];
    }

}
