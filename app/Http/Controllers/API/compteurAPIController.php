<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecompteurAPIRequest;
use App\Http\Requests\API\UpdatecompteurAPIRequest;
use App\Models\compteur;
use App\Repositories\compteurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\compteurResource;
use Response;

/**
 * Class compteurController
 * @package App\Http\Controllers\API
 */

class compteurAPIController extends AppBaseController
{
    /** @var  compteurRepository */
    private $compteurRepository;

    public function __construct(compteurRepository $compteurRepo)
    {
        $this->compteurRepository = $compteurRepo;
    }

    /**
     * Display a listing of the compteur.
     * GET|HEAD /compteurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $compteurs = $this->compteurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(compteurResource::collection($compteurs), 'Compteurs retrieved successfully');
    }

    /**
     * Store a newly created compteur in storage.
     * POST /compteurs
     *
     * @param CreatecompteurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecompteurAPIRequest $request)
    {
        $input = $request->all();

        $compteur = $this->compteurRepository->create($input);

        return $this->sendResponse(new compteurResource($compteur), 'Compteur saved successfully');
    }

    /**
     * Display the specified compteur.
     * GET|HEAD /compteurs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var compteur $compteur */
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            return $this->sendError('Compteur not found');
        }

        return $this->sendResponse(new compteurResource($compteur), 'Compteur retrieved successfully');
    }

    /**
     * Update the specified compteur in storage.
     * PUT/PATCH /compteurs/{id}
     *
     * @param int $id
     * @param UpdatecompteurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompteurAPIRequest $request)
    {
        $input = $request->all();

        /** @var compteur $compteur */
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            return $this->sendError('Compteur not found');
        }

        $compteur = $this->compteurRepository->update($input, $id);

        return $this->sendResponse(new compteurResource($compteur), 'compteur updated successfully');
    }

    /**
     * Remove the specified compteur from storage.
     * DELETE /compteurs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var compteur $compteur */
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            return $this->sendError('Compteur not found');
        }

        $compteur->delete();

        return $this->sendSuccess('Compteur deleted successfully');
    }
}
