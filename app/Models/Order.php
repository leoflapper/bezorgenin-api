<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version March 18, 2020, 7:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property string name
 * @property string description
 * @property string allergens
 * @property integer quantity
 * @property number price
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'street',
        'housenumber',
        'housenumber_addition',
        'postcode',
        'city',
        'country_id',
        'email',
        'telephone',
        'note',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'allergens' => 'string',
        'quantity' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'company_id' => 'required|integer',
        'street' => 'required',
        'housenumber' => "required|integer",
        'housenumber_addition' => '',
        'postcode' => 'required',
        'city' => 'required',
        'country_id' => '',
        'email' => 'required|email',
        'telephone' => 'required',
        'note' => '',
	    'meals' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function company()
    {
        return $this->hasOne(\App\Models\Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class);
    }
}
