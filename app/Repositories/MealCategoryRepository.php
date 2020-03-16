<?php

namespace App\Repositories;

use App\Models\MealCategory;
use App\Repositories\BaseRepository;

/**
 * Class MealCategoryRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:14 pm UTC
*/

class MealCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return MealCategory::class;
    }
}
