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

    public function find($id, $columns = ['*'])
    {
        $meal = null;
        if($meal = parent::find($id, $columns)) {
            if(!auth()->user()->hasRole('admin')) {
                if(!$this->authUserHasCompany($meal->company_id)) {
                    return null;
                }
            }
        }
        return $meal;
    }

    public function create($input)
    {
        $input = $this->setCompanyId($input);
        return parent::create($input);
    }

    public function update($input, $id)
    {
        $input = $this->setCompanyId($input);
        return parent::update($input, $id);
    }

    /**
     * @param array $input
     * @return array
     */
    private function setCompanyId(array $input): array
    {
        if(!auth()->user()->hasRole('admin')) {
            if(!$this->authUserHasCompany($input['company_id'])) {
                $input['company_id'] = auth()->user()->companies()->first()->id;
            }
        }
        return $input;
    }

    /**
     * @param int $companyId
     * @return bool
     */
    private function authUserHasCompany(int $companyId): bool
    {
       return (bool)auth()->user()->companies()->where('id', $companyId)->first();
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
