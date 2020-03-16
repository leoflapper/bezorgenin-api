<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Meal
 * @package App\Models
 * @version March 16, 2020, 7:53 pm UTC
 *
 * @property \App\Models\MealCategory mealCategory
 * @property \App\Models\Company company
 * @property integer meal_category_id
 * @property integer company_id
 * @property string name
 * @property string description
 * @property string allergens
 */
class Meal extends Model
{
    use SoftDeletes;

    public $table = 'meals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'meal_category_id',
        'company_id',
        'name',
        'description',
        'allergens'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'meal_category_id' => 'integer',
        'company_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'allergens' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function mealCategory()
    {
        return $this->hasOne(\App\Models\MealCategory::class, 'meal_categories', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function company()
    {
        return $this->hasOne(\App\Models\Company::class, 'company', 'id');
    }
}
