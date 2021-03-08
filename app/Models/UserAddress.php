<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    protected $fillable = ['user_id', 'address_type', 'building_type', 'residential_type',

        'street', 'city', 'state', 'zip', 'unit_number', 'building_name', 'gate_code'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function setUserIdAttribute()
    // {
    //     $this->attributes['user_id'] = auth()->id();
    // }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->user_id = $user->id;
        });

    }
}
