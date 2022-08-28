<?php

namespace Domain\ZipCode\DataTransferObjects;

use Spatie\LaravelData\Data;

class FederalEntityDto extends Data
{
    public function __construct(
        public int     $key,
        public string  $name,
        public ?string $code
    )
    {
    }

    public static function fromModel($data): self
    {
        return new self(
            $data['key'],
            $data['name'],
            $data['code'],
        );
    }
}
