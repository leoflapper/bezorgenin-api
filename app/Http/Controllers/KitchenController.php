<?php

namespace App\Http\Controllers;

use App\DataTables\KitchenDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKitchenRequest;
use App\Http\Requests\UpdateKitchenRequest;
use App\Repositories\KitchenRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KitchenController extends AppBaseController
{
    /** @var  KitchenRepository */
    private $kitchenRepository;

    public function __construct(KitchenRepository $kitchenRepo)
    {
        $this->kitchenRepository = $kitchenRepo;
    }

    /**
     * Display a listing of the Kitchen.
     *
     * @param KitchenDataTable $kitchenDataTable
     * @return Response
     */
    public function index(KitchenDataTable $kitchenDataTable)
    {
        return $kitchenDataTable->render('kitchens.index');
    }

    /**
     * Show the form for creating a new Kitchen.
     *
     * @return Response
     */
    public function create()
    {
        return view('kitchens.create');
    }

    /**
     * Store a newly created Kitchen in storage.
     *
     * @param CreateKitchenRequest $request
     *
     * @return Response
     */
    public function store(CreateKitchenRequest $request)
    {
        $input = $request->all();

        $kitchen = $this->kitchenRepository->create($input);

        Flash::success('Kitchen saved successfully.');

        return redirect(route('kitchens.index'));
    }

    /**
     * Display the specified Kitchen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            Flash::error('Kitchen not found');

            return redirect(route('kitchens.index'));
        }

        return view('kitchens.show')->with('kitchen', $kitchen);
    }

    /**
     * Show the form for editing the specified Kitchen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            Flash::error('Kitchen not found');

            return redirect(route('kitchens.index'));
        }

        return view('kitchens.edit')->with('kitchen', $kitchen);
    }

    /**
     * Update the specified Kitchen in storage.
     *
     * @param  int              $id
     * @param UpdateKitchenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKitchenRequest $request)
    {
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            Flash::error('Kitchen not found');

            return redirect(route('kitchens.index'));
        }

        $kitchen = $this->kitchenRepository->update($request->all(), $id);

        Flash::success('Kitchen updated successfully.');

        return redirect(route('kitchens.index'));
    }

    /**
     * Remove the specified Kitchen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kitchen = $this->kitchenRepository->find($id);

        if (empty($kitchen)) {
            Flash::error('Kitchen not found');

            return redirect(route('kitchens.index'));
        }

        $this->kitchenRepository->delete($id);

        Flash::success('Kitchen deleted successfully.');

        return redirect(route('kitchens.index'));
    }
}
