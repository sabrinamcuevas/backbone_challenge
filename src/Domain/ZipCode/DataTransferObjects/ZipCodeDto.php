<?php

namespace Domain\ZipCode\DataTransferObjects;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\ZipCode;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Throwable;

class ZipCodeDto extends Data
{
    public function __construct(
        public string           $zip_code,
        public string           $locality,
        public FederalEntityDto $federal_entity,
        /** @var DataCollection<SettlementDto> */
        public DataCollection   $settlements,
        public MunicipalityDto  $municipality
    )
    {
    }

    public static function fromModel($id): self
    {
        $zipcode = self::zipcode($id);

        if (!$zipcode) return abort(404);

        try {
            $settlements = self::settlements($zipcode);

            return new self(
                $zipcode['zip_code'],
                $zipcode['locality'],
                FederalEntityDto::fromModel(self::entity($zipcode)),
                SettlementDto::collection($settlements),
                MunicipalityDto::fromModel(self::municipality($settlements))
            );
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
    }

    public static function zipcode($id)
    {
        return ZipCode::where('zip_code', $id)->first();
    }

    public static function entity($zipcode)
    {
        return FederalEntity::find($zipcode['federal_entity_id']);
    }

    public static function settlements($zipcode)
    {
        return Settlement::where('zip_code_id', $zipcode['id'])->get();
    }

    public static function municipality($settlements)
    {
        return Municipality::find($settlements[0]['municipality_id']);
    }
}
