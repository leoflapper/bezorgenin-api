<?php

namespace App\Http\Requests\API;

use App\Models\Order;
use InfyOm\Generator\Request\APIRequest;

class CreateOrderAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Order::$rules;
    }

    public function validate(array $rules, ...$params)
    {
        if(isset($params[0]['is_pickup']) && false == $params[0]['is_pickup']) {
            $rules['street'] = 'required';
            $rules['housenumber'] = 'required|integer';
            $rules['housenumber_addition'] = '';
            $rules['postcode'] = 'required';
            $rules['city'] = 'required';
            $rules['country_id'] = 'required';
        }

        return parent::validate($rules, $params);

    }
}
