<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateappartementAPIRequest;
use App\Http\Requests\API\UpdateappartementAPIRequest;
use App\Models\appartement;
use App\Repositories\appartementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\appartementResource;
use Response;

/**
 * Class appartementController
 * @package App\Http\Controllers\API
 */

class appartementAPIController extends AppBaseController
{
    /** @var  appartementRepository */
    private $appartementRepository;

    public function __construct(appartementRepository $appartementRepo)
    {
        $this->appartementRepository = $appartementRepo;
    }

    /**
     * Display a listing of the appartement.
     * GET|HEAD /appartements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $appartements = $this->appartementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(appartementResource::collection($appartements), 'Appartements retrieved successfully');
    }

    /**
     * Store a newly created appartement in storage.
     * POST /appartements
     *
     * @param CreateappartementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateappartementAPIRequest $request)
    {
        $input = $request->all();

        $appartement = $this->appartementRepository->create($input);

        return $this->sendResponse(new appartementResource($appartement), 'Appartement saved successfully');
    }

    /**
     * Display the specified appartement.
     * GET|HEAD /appartements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var appartement $appartement */
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            return $this->sendError('Appartement not found');
        }

        return $this->sendResponse(new appartementResource($appartement), 'Appartement retrieved successfully');
    }

    /**
     * Update the specified appartement in storage.
     * PUT/PATCH /appartements/{id}
     *
     * @param int $id
     * @param UpdateappartementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateappartementAPIRequest $request)
    {
        $input = $request->all();

        /** @var appartement $appartement */
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            return $this->sendError('Appartement not found');
        }

        $appartement = $this->appartementRepository->update($input, $id);

        return $this->sendResponse(new appartementResource($appartement), 'appartement updated successfully');
    }

    /**
     * Remove the specified appartement from storage.
     * DELETE /appartements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var appartement $appartement */
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            return $this->sendError('Appartement not found');
        }

        $appartement->delete();

        return $this->sendSuccess('Appartement deleted successfully');
    }
}
