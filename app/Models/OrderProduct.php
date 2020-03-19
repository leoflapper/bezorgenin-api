<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderProduct
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
class OrderProduct extends Model
{
    use SoftDeletes;

    public $table = 'order_products';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'allergens',
        'quantity',
        'price',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
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
        'order_id' => 'required',
        'name' => 'required',
        'description' => '',
        'allergens' => '',
        'quantity' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function orders()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
