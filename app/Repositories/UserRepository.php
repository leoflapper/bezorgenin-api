<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Company;
use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 21, 2020, 7:47 pm CET
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * @param int $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $user = null;
        if($user = parent::find($id, $columns)) {
            if(!auth()->user()->hasRole('admin') && auth()->user()->id !== $user->id) {
                return null;
            }
        }
        return $user;
    }

    /**
     * @param array $input
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function update($input, $id)
    {
        if(isset($input['id'])) {
            if(!auth()->user()->hasRole('admin') && auth()->user()->id !== $input['id']) {
                $input['id'] =auth()->user()->id;
            }
        }

        return parent::update($input, $id);
    }

    /**
     * @param int $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function delete($id)
    {
        if(!auth()->user()->hasRole('admin') && auth()->user()->id !== (int)$id) {
            return null;
        }
        $user = $this->find($id);

        /**
         * Create unique email address to allow the email address for a new registration
         */
        $user->email = $user->email . ' - removed ';
        $user->email .= substr(Hash::make($user->email), 10, 10);
        $user->save();

        if(parent::delete($id)) {
            $user->companies()->delete();
        }

        return true;
    }

    /**
     * Initializes a new user with a company and address
     *
     * @param User $user
     * @return User
     */
    public function initUser(User $user)
    {
        $user->assignRole('company');

        $address = new Address();
        $address->save();

        $company = new Company();
        $company->name = $user->name . ' Restaurant';
        $company->address_id = $address->id;
        $company->email = $user->email;
        $company->user_id = $user->id;

        $company->save();

        return $user;
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
        return User::class;
    }


    /**
     * @param int $companyId
     * @return bool
     */
    private function authUserHasCompany(int $companyId): bool
    {
        return (bool)auth()->user()->companies()->where('id', $companyId)->first();
    }
}
