<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'zone_type',
        'settlement_type_id',
        'municipality_id',
        'zip_code_id'
    ];

}
