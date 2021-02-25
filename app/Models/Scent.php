<?php

namespace App\Models;

use App\Models\CategoryScent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scent extends Model
{
    use HasFactory;
    protected $table = 'scents';

    protected $fillable = ['name', 'price', 'image', 'category_scents_id'];

    public function category()
    {
        return $this->belongsTo(CategoryScent::class, 'category_scents_id');
    }
}
