<?php

namespace App\Models;

use App\Models\CategoryDetergent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detergent extends Model
{
    use HasFactory;
    protected $table = 'detergents';

    protected $fillable = ['name', 'price', 'image', 'category_detergents_id'];

    public function category()
    {
        return $this->belongsTo(CategoryDetergent::class, 'category_detergents_id');
    }

}
