<?php

namespace App\Models;

use App\Models\Freshener;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFreshener extends Model
{
    use HasFactory;
    protected $table = 'category_fresheners';

    protected $fillable = ['name'];

    protected $with = ['fresheners'];

    public function fresheners()
    {
        return $this->hasMany(Freshener::class, 'category_fresheners_id');
    }
}
