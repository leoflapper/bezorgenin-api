<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MealCategory
 * @package App\Models
 * @version March 16, 2020, 7:14 pm UTC
 *
 * @property string name
 */
class MealCategory extends Model
{
    use SoftDeletes;

    public $table = 'meal_categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:meal_categories'
    ];


}
