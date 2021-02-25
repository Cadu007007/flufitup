<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetergent extends Model
{
    use HasFactory;

    protected $table = 'category_detergents';

    protected $fillable = ['name'];
}
