<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKitchenAPIRequest;
use App\Http\Requests\API\UpdateKitchenAPIRequest;
use App\Models\Kitchen;
use App\Query\CompanyQueryBuilder;
use App\Repositories\CompanyRepository;
use App\Repositories\KitchenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Collection;
use Response;

/**
 * Class KitchenController
 * @package App\Http\Controllers\API
 */

class KitchenAPIController extends AppBaseController
{
    /** @var  KitchenRepository */
    private $kitchenRepository;

    public function __construct(KitchenRepository $kitchenRepo)
    {
        $this->kitchenRepository = $kitchenRepo;
    }

    /**
     * Display a listing of the Kitchen.
     * GET|HEAD /kitchens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kitchens = $this->kitchenRepository->getByAppDomain(
            $request->header('AppDomain', ''),
            [],
            $request->get('skip'),
            $request->get('limit')
        );

        $result = new Collection();
        foreach ($kitchens as $kitchen) {
            $result->push($kitchen->toArrayWithRelationships());
        }


        return $this->sendResponse($result, 'Kitchens retrieved successfully');
    }

    /**
     * Store a newly created Kitchen in storage.
     * POST /kitchens
     *
     * @param CreateKitchenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKitchenAPIRequest $request)
    {
        $input = $request->all();

        $kitchen = $this->kitchenRepository->create($input);

        return $this->sendResponse($kitchen->toArray(), 'Kitchen saved successfully');
    }

    /**
     * Display the specified Kitchen.
     * GET|HEAD /kitchens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        /** @var Kitchen $kitchen */
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            return $this->sendError('Kitchen not found');
        }

        $data = $kitchen->toArray();

        $data['companies'] = app(CompanyRepository::class)
            ->getQueryByRequest($request)
            ->query()
            ->whereHas('kitchens', function($q) use($id){
                $q->where('kitchens.id', $id);
            })->get();

        return $this->sendResponse($data, 'Kitchen retrieved successfully');
    }

    /**
     * Update the specified Kitchen in storage.
     * PUT/PATCH /kitchens/{id}
     *
     * @param int $id
     * @param UpdateKitchenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKitchenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kitchen $kitchen */
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            return $this->sendError('Kitchen not found');
        }

        $kitchen = $this->kitchenRepository->update($input, $id);

        return $this->sendResponse($kitchen->toArray(), 'Kitchen updated successfully');
    }

    /**
     * Remove the specified Kitchen from storage.
     * DELETE /kitchens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kitchen $kitchen */
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            return $this->sendError('Kitchen not found');
        }

        $kitchen->delete();

        return $this->sendSuccess('Kitchen deleted successfully');
    }
}
