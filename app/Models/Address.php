<?php

namespace App\Models;

use App\Location\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version March 16, 2020, 7:13 pm UTC
 *
 * @property string street
 * @property integer housenumber
 * @property string housenumber_addition
 * @property string postcode
 * @property string city
 * @property string country_id
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'street',
        'housenumber',
        'housenumber_addition',
        'postcode',
        'city',
        'country_id',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'street' => 'string',
        'housenumber' => 'integer',
        'housenumber_addition' => 'string',
        'postcode' => 'string',
        'city' => 'string',
        'country_id' => 'string',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'street' => 'required',
        'housenumber' => 'required',
        'postcode' => 'required',
        'city' => 'required',
        'country_id' => 'required',
        'latitude' => '',
        'longitude' => ''
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updating(function (Address $address) {
            try {
                $address->setCoordinates();
            } catch (\Exception $exception) {
                report($exception);
            }
        });
    }

    /**
     * Sets coordinates for looking up address
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \maxh\Nominatim\Exceptions\NominatimException
     */
    public function setCoordinates()
    {
        if(!$this->country_id || !$this->postcode || !$this->city) {
            return;
        }

        if(!$location = (new Location())->getByAddress($this)) {
            return;
        }

        if(isset($location[0])) {
            $this->latitude = $location[0]['lat'];
            $this->longitude = $location[0]['lon'];
        }
    }

    public function getIdentifierAttribute()
    {
        $identifier = $this->street . ' ' . $this->housenumber;
        if($this->housenumber_addition) {
            $identifier .= ' ' . $this->housenumber_addition;
        }
        $identifier .= ', '. $this->city;
        return $identifier;
    }

}
