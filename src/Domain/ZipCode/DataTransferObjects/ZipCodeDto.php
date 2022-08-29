<?php

namespace Domain\ZipCode\DataTransferObjects;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
                $zipcode->zip_code,
                $zipcode->locality,
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
        return Cache::remember('zip_codes', 1, function () use ($id) {
            return DB::table('zip_codes')->where('zip_code', $id)->first();
        });
    }

    public static function entity($zipcode)
    {
        return Cache::remember('federal_entities', 1, function () use ($zipcode) {
            return DB::table('federal_entities')->find($zipcode->federal_entity_id);
        });
    }

    public static function settlements($zipcode)
    {
        return Cache::remember('settlements', 1, function () use ($zipcode) {
            return DB::table('settlements')->where('zip_code_id', $zipcode->id)->get();
        });
    }

    public static function municipality($settlements)
    {
        return Cache::remember('municipalities', 1, function () use ($settlements) {
            return DB::table('municipalities')->find($settlements[0]->municipality_id);
        });
    }
}
