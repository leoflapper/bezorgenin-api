<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompanyAPIRequest;
use App\Http\Requests\API\UpdateCompanyAPIRequest;
use App\Models\Company;
use App\Query\CompanyQueryBuilder;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CompanyController
 * @package App\Http\Controllers\API
 */

class CompanyAPIController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     * GET|HEAD /companies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $companiesQuery = CompanyQueryBuilder::create()
            ->allQuery([],
                $request->get('skip'),
                $request->get('limit')
            )
            ->byAppDomain($request->header('AppDomain', ''));

//        $latitude = 53.1917548;
//        $longitude =  5.8013954;
        if($request->query('order_by') === 'coordinates' && $request->header('latitude') &&  $request->header('longitude')) {
            $companiesQuery->orderByCoordinates($request->header('latitude'), $request->header('longitude'))  ;
        } else {
            $companiesQuery->query()->orderBy('companies.name', 'asc');
        }

        return $this->sendResponse($companiesQuery->get()->toArray(), 'Companies retrieved successfully');
    }

    /**
     * Store a newly created Company in storage.
     * POST /companies
     *
     * @param CreateCompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyAPIRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->create($input);

        return $this->sendResponse($company->toArray(), 'Company saved successfully');
    }

    /**
     * Display the specified Company.
     * GET|HEAD /companies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        return $this->sendResponse($company->toArrayWithRelationships(), 'Company retrieved successfully');
    }

    /**
     * Update the specified Company in storage.
     * PUT/PATCH /companies/{id}
     *
     * @param int $id
     * @param UpdateCompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company = $this->companyRepository->update($input, $id);

        return $this->sendResponse($company->toArray(), 'Company updated successfully');
    }

    /**
     * Remove the specified Company from storage.
     * DELETE /companies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company->delete();

        return $this->sendSuccess('Company deleted successfully');
    }
}
