<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKitchenAPIRequest;
use App\Http\Requests\API\UpdateKitchenAPIRequest;
use App\Models\Kitchen;
use App\Repositories\KitchenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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
        $kitchens = $this->kitchenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kitchens->toArray(), 'Kitchens retrieved successfully');
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
    public function show($id)
    {
        /** @var Kitchen $kitchen */
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            return $this->sendError('Kitchen not found');
        }

        return $this->sendResponse($kitchen->toArray(), 'Kitchen retrieved successfully');
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
