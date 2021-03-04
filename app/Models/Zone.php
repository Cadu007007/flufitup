<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';

    protected $fillable = ['name', 'processing', 'washing'];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'zone_cities');
    }
}