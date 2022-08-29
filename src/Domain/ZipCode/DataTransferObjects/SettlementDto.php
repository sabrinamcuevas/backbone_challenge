<?php

namespace Domain\ZipCode\DataTransferObjects;

use App\Models\SettlementType;
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
        $settlement_type = SettlementType::find($data->settlement_type_id);
        return new self(
            $data->key,
            $data->name,
            $data->zone_type,
            SettlementTypeDto::fromModel($settlement_type)
        );
    }
}
