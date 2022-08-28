<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'locality',
        'federal_entity_id'
    ];

}
