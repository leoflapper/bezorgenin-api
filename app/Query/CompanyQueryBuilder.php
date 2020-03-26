<?php


namespace App\Query;


use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class CompanyQueryBuilder
{

    protected $query;

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

    public function __construct()
    {
        $this->query = Company::query();
    }

    public static function create(): CompanyQueryBuilder
    {
        return new self();
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null): CompanyQueryBuilder
    {
        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->fieldSearchable)) {
                    $this->query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $this->query->skip($skip);
        }

        if (!is_null($limit)) {
            $this->query->limit($limit);
        }

        return $this;
    }

    /**
     * @param $latitude
     * @param $longitude
     * @return Builder
     */
    public function orderByCoordinates($latitude, $longitude): CompanyQueryBuilder
    {
        $this->query
            ->with('address')
            ->leftJoin('addresses', 'addresses.id', 'companies.address_id')
            ->where([
                ['addresses.latitude', '!=', null],
                ['addresses.longitude', '!=', null],
            ])
            ->orderByRaw(\DB::raw('( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( addresses.latitude ) ) * cos( radians( addresses.longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( addresses.latitude ) ) ) ) asc'))
            ;
        return $this;
    }

    /**
     * @param string $appDomain
     * @param array $search
     * @param null $skip
     * @param null $limit
     * @param array $columns
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function byAppDomain(string $appDomain = ''): CompanyQueryBuilder
    {
        if($siteConfig = config('sites.'.$appDomain)) {
            if(isset($siteConfig['cities']) && $siteConfig['cities'] !== '*') {
                $this->query->whereHas('address', function (Builder $query) use ($siteConfig) {
                    $query->whereIn('city', $siteConfig['cities']);
                });

            }
        }

        return $this;
    }

    public function query()
    {
        return $this->query;
    }

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return $this->query->get();
    }
}
