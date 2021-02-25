<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFabric extends Model
{
    use HasFactory;

    protected $table = 'category_fabrics';

    protected $fillable = ['name'];
}
