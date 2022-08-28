<?php

namespace Domain\ZipCode\DataTransferObjects;

use Spatie\LaravelData\Data;

class SettlementTypeDto extends Data
{
    public function __construct(
        public string $name
    )
    {
    }

    public static function fromModel($data): self
    {
        return new self(
            $data['name']
        );
    }
}
