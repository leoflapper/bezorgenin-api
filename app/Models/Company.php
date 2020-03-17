<?php

namespace App\Models;

use App\Repositories\MealCategoryRepository;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class Company
 * @package App\Models
 * @version March 16, 2020, 7:20 pm UTC
 *
 * @property \App\Models\Address address
 * @property \Illuminate\Database\Eloquent\Collection kitchens
 * @property \Illuminate\Database\Eloquent\Collection meals
 * @property string name
 * @property string first_name
 * @property string last_name
 * @property integer address_id
 * @property number delivery_costs
 * @property number min_order_amount
 * @property string email
 * @property string telephone
 * @property string iban
 * @property string kvk
 * @property string vat_id
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'first_name',
        'slug',
        'image_url',
        'last_name',
        'address_id',
        'delivery_costs',
        'min_order_amount',
        'email',
        'telephone',
        'iban',
        'kvk',
        'vat_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image_url' => 'string',
        'slug' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'address_id' => 'integer',
        'delivery_costs' => 'float',
        'min_order_amount' => 'float',
        'email' => 'string',
        'telephone' => 'string',
        'iban' => 'string',
        'kvk' => 'string',
        'vat_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'required',
        'image_url' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'delivery_costs' => 'required',
        'min_order_amount' => 'required',
        'email' => 'email',
        'telephone' => 'required',
        'iban' => 'required',
        'vat_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class, 'id', 'address_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function kitchens()
    {
        return $this->belongsToMany(\App\Models\Kitchen::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function meals()
    {
        return $this->hasMany(\App\Models\Meal::class, 'company_id', 'id');
    }

    public function toArrayWithRelationships()
    {
        $data = $this->toArray();
        $data['address'] = $this->address->toArray();
        $data['kitchens'] = $this->kitchens->toArray();
        $data['categories'] = $this->getMealsByCategory();
        return $data;
    }

    public function getMealsByCategory()
    {
        $result = new Collection();
        foreach (app( MealCategoryRepository::class)->all() as $category) {
            $item = $category->toArray();
            $item['meals'] = $this->meals()->where('meal_category_id', $category->id)->where('company_id', $this->id)->get();
            $result->push($item);
        }

        return $result;
    }
}
