<?php

namespace App\Models;

use App\Site;
use App\Util\WhatsApp;
use Illuminate\Database\Eloquent\Model;
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
        'is_pickup',
        'company_id',
        'street',
        'housenumber',
        'housenumber_addition',
        'postcode',
        'city',
        'country_id',
        'email',
        'telephone',
        'delivery_time',
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
        'street' => '',
        'housenumber' => "",
        'housenumber_addition' => '',
        'postcode' => '',
        'city' => '',
        'country_id' => '',
        'email' => 'required|email',
        'telephone' => 'required',
        'note' => '',
        'delivery_time' => '',
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

    /**
     * @return Site
     */
    public function site()
    {
        return $this->getSiteAttribute();
    }

    /**
     * Get the site class
     *
     * @return Site
     */
    public function getSiteAttribute()
    {
        return new Site($this->website);
    }

    /**
     * @return mixed|string
     */
    public function getDeliveryTimeStringAttribute()
    {
        if($this->delivery_time === 'szm') {
            return 'Zo snel mogelijk';
        }

        try {
            $dateTime = new \DateTime($this->delivery_time);
            return $dateTime->format('H:i');
        } catch (\Exception $e) {}

        return $this->delivery_time;
    }

    /**
     * @return string
     */
    public function getWhatsAppClickAndChat(): string
    {
        $text = '';
        if($this->delivery_time_string && $this->delivery_time !== 'szm') {
            $text = 'Beste %s %s, je bestelling ';
            if(true === $this->is_pickup) {
                $text .= 'staat om %s voor je klaar.';
            } else {
                $text .= 'wordt om %s bezorgt.';
            }
            $text .= ' Groet, team %s';

            $text = sprintf($text, $this->first_name, $this->last_name, $this->delivery_time_string, $this->company->name);
        }

        return WhatsApp::getClickAndChatUrl($this->telephone, $this->country_id, $text);
    }

    /**
     * @return mixed
     */
    public function toArrayWithRelationships()
    {
        $data = $this->toArray();
        $data['order_products'] = $this->orderProducts->toArray();
        $data['company'] = $this->company->toArray();
        return $data;
    }

}
