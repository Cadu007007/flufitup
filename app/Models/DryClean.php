<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DryClean extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['price', 'name'];

    protected $table = 'dry_cleans';

}
