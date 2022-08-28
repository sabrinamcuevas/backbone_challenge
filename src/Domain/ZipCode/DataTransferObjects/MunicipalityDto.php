<?php

namespace Domain\ZipCode\DataTransferObjects;

use Spatie\LaravelData\Data;

class MunicipalityDto extends Data
{
    public function __construct(
        public int    $key,
        public string $name
    )
    {
    }

    public static function fromModel($data): self
    {
        return new self(
            $data['key'],
            $data['name'],
        );
    }
}
