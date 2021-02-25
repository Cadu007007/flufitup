<?php

namespace App\Models;

use App\Models\CategoryDryer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dryer extends Model
{
    use HasFactory;
    protected $table = 'dryers';

    protected $fillable = ['name', 'price', 'image', 'category_dryers_id'];

    public function category()
    {
        return $this->belongsTo(CategoryDryer::class, 'category_dryers_id');
    }
}
