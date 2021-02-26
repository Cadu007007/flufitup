<?php

namespace App\Models;

use App\Models\Dryer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDryer extends Model
{
    use HasFactory;
    protected $table = 'category_dryers';

    protected $with = ['dryers'];
    protected $fillable = ['name'];
    public function dryers()
    {
        return $this->hasMany(Dryer::class, 'category_dryers_id');
    }
}
