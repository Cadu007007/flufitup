<?php

namespace App\Models;

use App\Models\Detergent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetergent extends Model
{
    use HasFactory;

    protected $table = 'category_detergents';

    protected $with = ['detergents'];
    protected $fillable = ['name'];

    public function detergents()
    {
        return $this->hasMany(Detergent::class, 'category_detergents_id');
    }
}
