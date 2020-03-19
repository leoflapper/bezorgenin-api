<?php

namespace App\Repositories;

use App\Models\OrderProduct;
use App\Repositories\BaseRepository;

/**
 * Class OrderProductRepository
 * @package App\Repositories
 * @version March 18, 2020, 7:58 pm UTC
*/

class OrderProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'allergens',
        'quantity',
        'price'
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
        return OrderProduct::class;
    }
}
