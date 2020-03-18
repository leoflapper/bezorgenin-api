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
        if(!$result = parent::find($id, $columns)) {
            $result = $this->model->newQuery()->where('slug', $id)->first($columns);
        }
        return $result;
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
}
