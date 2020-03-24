<?php

namespace App\Repositories;

use App\Models\Kitchen;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

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
     * @param string $appDomain
     * @param array $search
     * @param null $skip
     * @param null $limit
     * @param array $columns
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getByAppDomain(string $appDomain = '', $search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        if($siteConfig = config('sites.'.$appDomain)) {
            if(isset($siteConfig['cities']) && $siteConfig['cities'] !== '*') {
                $query->whereHas('companies.address', function (Builder $query) use ($siteConfig) {
                    $query->whereIn('city', $siteConfig['cities']);
                });

            }
        }

        return $query->get($columns);
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kitchen::class;
    }
}
