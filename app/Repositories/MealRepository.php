<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Meal;
use App\Repositories\BaseRepository;

/**
 * Class MealRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:53 pm UTC
*/

class MealRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'allergens'
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
        return Meal::class;
    }

    /**
     * @param int $id
     * @param Company $company
     * @return mixed
     */
    public function getByIdAndCompany(int $id, Company $company) {
        return $this->makeModel()->query()->where('id', $id)->where('company_id', $company->id)->first();
    }
}
