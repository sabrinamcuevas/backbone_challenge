<?php

namespace App\Imports;

use App\Models\ZipCode;
use App\Models\Settlement;
use Illuminate\Support\Str;
use App\Models\Municipality;
use App\Models\FederalEntity;
use App\Models\SettlementType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ZipcodesImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithEvents
{
    public function model(array $row): Settlement
    {
        $federal_entity = FederalEntity::updateOrCreate([
            'key' => $row[7],
            'name' => Str::upper(self::encodStr($row[4])),
            'code' => $row[9],
        ]);

        $zip_code = ZipCode::updateOrCreate([
            'zip_code' => $row[0],
            'locality' => Str::upper(self::encodStr($row[5])),
            'federal_entity_id' => $federal_entity->id
        ]);

        $settlement_type = SettlementType::updateOrCreate([
            'name' => $row[2]
        ]);

        $municipality = Municipality::updateOrCreate([
            'key' => $row[11],
            'name' => Str::upper(self::encodStr($row[3]))
        ]);

        return new Settlement([
            'key' => $row[12],
            'name' => Str::upper(self::encodStr($row[1])),
            'zone_type' => Str::upper(self::encodStr($row[13])),
            'settlement_type_id' => $settlement_type->id,
            'municipality_id' => $municipality->id,
            'zip_code_id' => $zip_code->id
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                $this->importedBy->notify(new ImportHasFailedNotification);
            },
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function encodStr($text){
        return iconv("utf-8", "ascii//TRANSLIT", $text);
    }

}
