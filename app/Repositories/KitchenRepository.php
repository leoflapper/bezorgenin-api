<?php

namespace App\Repositories;

use App\Models\Kitchen;
use App\Repositories\BaseRepository;

/**
 * Class KitchenRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:13 pm UTC
*/

class KitchenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Kitchen::class;
    }
}
