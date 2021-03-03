<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneCity extends Model
{
    use HasFactory;

    protected $table = 'zone_cities';

    protected $fillable = ['zone_id', 'city_id'];
}
