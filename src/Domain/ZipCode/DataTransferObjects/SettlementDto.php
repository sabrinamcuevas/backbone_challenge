<?php

namespace Domain\ZipCode\DataTransferObjects;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelData\Data;

class SettlementDto extends Data
{
    public function __construct(
        public int               $key,
        public string            $name,
        public string            $zone_type,
        public SettlementTypeDto $settlement_type
    )
    {
    }

    public static function fromModel($data): self
    {
        $settlement_type = Cache::remember('settlement_types', 10, function () use ($data) {
            return DB::table('settlement_types')->find($data->settlement_type_id);
        });
        return new self(
            $data->key,
            $data->name,
            $data->zone_type,
            SettlementTypeDto::fromModel($settlement_type)
        );
    }
}
