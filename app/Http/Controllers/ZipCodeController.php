<?php

namespace App\Http\Controllers;

use Domain\ZipCode\DataTransferObjects\ZipCodeDto;

class ZipCodeController extends Controller
{
    public function __invoke($zip_code): ZipCodeDto
    {
        return ZipCodeDto::fromModel($zip_code);
    }
}
