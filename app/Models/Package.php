<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**
     * database table name that model pointing for
     *@var string
     **/
    protected $table = 'packages';

    /**
     * the attributes that should be mass assignable
     *@var array
     **/
    protected $fillable = ['name', 'price', 'category',
        'no_pickups', 'advance_notice', 'bags_per_pickup', 'return_service',
        'dryer_option',
        'washing_option', 'detergent_id', 'laundry_softener', 'fabric_id', 'scent_id',
        'dryer_id', 'dry_clean_credit', 'house_hold_credit', 'added_value_service',
        'reward_points', 'price_of_extra_pound',
    ];

}
