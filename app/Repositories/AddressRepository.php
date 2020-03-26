<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\BaseRepository;
use maxh\Nominatim\Nominatim;

/**
 * Class AddressRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:13 pm UTC
*/

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'street',
        'housenumber',
        'housenumber_addition',
        'postcode',
        'city',
        'country_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Address::class;
    }
}
