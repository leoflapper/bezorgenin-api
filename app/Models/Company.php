<?php

namespace App\Models;

use App\Repositories\MealCategoryRepository;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use App\Util\OpeningHours;

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
    use Sluggable;

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
        'vat_id',
        'has_shipping',
        'has_pickup',
        'description',
        'website',
        'delivery_radius',
        'delivery_time_start',
        'delivery_time_end',
        'note_message',
        'opening_hours'
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
        'vat_id' => 'string',
        'has_shipping' => 'boolean',
        'has_pickup' => 'boolean',
        'description' => 'string',
        'website' => 'string',
        'delivery_radius' => 'string',
        'note_message' => 'string',
        'opening_hours' => OpeningHours::class
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'required',
        'image_url' => '',
        'first_name' => 'required',
        'last_name' => 'required',
        'delivery_costs' => 'required',
        'min_order_amount' => 'required',
        'email' => 'email',
        'telephone' => 'required',
        'iban' => 'required',
        'vat_id' => 'required',
        'description' => '',
        'website' => '',
        'delivery_radius' => '',
        'note_message' => ''
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['address'] = $this->address->toArray();

        $date = new \DateTime();
        $day = $date->format('l');

        $data['has_opening_hours'] = $this->getRawOriginal('opening_hours') !== null ? true: false;
        $data['opening_time'] = '';
        $data['closing_time'] = '';
        if(isset($this->opening_hours->forDay($day)->getIterator()[0])) {
            $data['opening_time'] =  $this->opening_hours->forDay($day)->getIterator()[0]->start()->format();
            $data['closing_time'] = $this->opening_hours->forDay($day)->getIterator()[0]->end()->format();
        }

        return $data;
    }

    public function toArrayWithRelationships()
    {
        $data = $this->toArray();

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
