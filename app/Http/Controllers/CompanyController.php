<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\AddressRepository;
use App\Repositories\CompanyRepository;
use Flash;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param CompanyDataTable $companyDataTable
     * @return Response
     */
    public function index(CompanyDataTable $companyDataTable)
    {
        return $companyDataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();

        $input = $this->setBooleans($input);

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->find($id);


        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }
        $input = $request->all();

        $input = $this->setBooleans($input);

        $company = $this->companyRepository->update($input, $id);

        if($addressInput = $this->getAddressInput($input)) {
            $addressRepository = app(AddressRepository::class);
            $company->address = $addressRepository->update($addressInput, $company->address->id);
        }

        Flash::success('Company updated successfully.');

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * @param $input
     * @return mixed
     */
    private function setBooleans($input)
    {
        $booleans = [
            'has_shipping',
            'has_pickup'
        ];

        foreach ($booleans as $boolean) {
            if(!isset($input[$boolean])) {
                $input[$boolean] = false;
            }
        }

        return $input;
    }

    /**
     * @param array $input
     * @return array
     */
    private function getAddressInput(array $input)
    {
        $addressInput = [];
        foreach ($input as $key => $value) {
            if(strpos($key, 'address_') !== false) {
                $addressInput[str_replace('address_', '', $key)] = $value;
            }
        }
        return $addressInput;
    }

}
