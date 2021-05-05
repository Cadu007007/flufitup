<?php

namespace App\Models;

use App\Models\CategoryFreshener;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freshener extends Model
{
    use HasFactory;
    protected $table = 'fresheners';

    protected $fillable = ['name', 'price', 'image', 'category_fresheners_id'];

    public function category()
    {
        return $this->belongsTo(CategoryFreshener::class, 'category_fresheners_id');
    }
}
