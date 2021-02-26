<?php

namespace App\Models;

use App\Models\Scent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryScent extends Model
{
    use HasFactory;
    protected $table = 'category_scents';

    protected $fillable = ['name'];

    protected $with = ['scents'];

    public function scents()
    {
        return $this->hasMany(Scent::class, 'category_scents_id');
    }
}
