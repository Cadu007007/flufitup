<?php

namespace App\Models;

use App\Models\CategoryFabric;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;
    protected $table = 'fabrics';

    protected $fillable = ['name', 'price', 'image', 'category_fabrics_id'];

    public function category()
    {
        return $this->belongsTo(CategoryFabric::class, 'category_fabrics_id');
    }

}
