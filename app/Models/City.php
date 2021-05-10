<?php

namespace App\Models;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $fillable = ['name'];

    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'zone_cities');
    }

    public function zips()
    {
        return $this->hasMany(Zip::class);
    }
}
