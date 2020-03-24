<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Kitchen;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version March 16, 2020, 7:20 pm UTC
*/

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'first_name',
        'last_name',
        'delivery_costs',
        'min_order_amount',
        'email',
        'telephone',
        'iban',
        'kvk',
        'vat_id'
    ];

    public function find($id, $columns = ['*'])
    {
        if(!$company = parent::find($id, $columns)) {
            $company = $this->model->newQuery()->where('slug', $id)->first($columns);
        }

        return $company;
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
        return Company::class;
    }

    public function update($input, $id)
    {
        if(!auth()->user()->hasRole('admin')) {
            if(!$this->authUserHasCompany($id)) {
                return null;
            }
        }

        if(isset($input['delivery_costs'])) {
            $input['delivery_costs'] = str_replace(',', '.', $input['delivery_costs']);
        }

        if(isset($input['min_order_amount'])) {
            $input['min_order_amount'] = str_replace(',', '.', $input['min_order_amount']);
        }

        /**
         * @var $model Company
         */
        $model = parent::update($input, $id); // TODO: Change the autogenerated stub
        if(isset($input['kitchens'])) {
            if($items = Kitchen::query()->find($input['kitchens'])) {
                $model->kitchens()->sync($items);
            }
        }

        return $model;
    }

    public function delete($id)
    {
        if(!auth()->user()->hasRole('admin')) {
            if(!$this->authUserHasCompany($id)) {
                return null;
            }
        }

        $company = $this->find($id);
        if(parent::delete($id)) {
            $company->meals()->delete();
            $company->address()->delete();
        }

        return true;
    }
}
