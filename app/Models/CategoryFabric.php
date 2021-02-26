<?php

namespace App\Models;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFabric extends Model
{
    use HasFactory;

    protected $table = 'category_fabrics';

    protected $fillable = ['name'];

    protected $with = ['fabrics'];
    public function fabrics()
    {
        return $this->hasMany(Fabric::class, 'category_fabrics_id');
    }
}
