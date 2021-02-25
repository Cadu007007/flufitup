<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryScent extends Model
{
    use HasFactory;
    protected $table = 'category_scents';

    protected $fillable = ['name'];
}
