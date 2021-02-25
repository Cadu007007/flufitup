<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDryer extends Model
{
    use HasFactory;
    protected $table = 'category_dryers';

    protected $fillable = ['name'];
}
