<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientsAPIRequest;
use App\Http\Requests\API\UpdateClientsAPIRequest;
use App\Models\Clients;
use App\Repositories\ClientsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ClientsResource;
use Response;

/**
 * Class ClientsController
 * @package App\Http\Controllers\API
 */

class ClientsAPIController extends AppBaseController
{
    /** @var  ClientsRepository */
    private $clientsRepository;

    public function __construct(ClientsRepository $clientsRepo)
    {
        $this->clientsRepository = $clientsRepo;
    }

    /**
     * Display a listing of the Clients.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = $this->clientsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ClientsResource::collection($clients), 'Clients retrieved successfully');
    }

    /**
     * Store a newly created Clients in storage.
     * POST /clients
     *
     * @param CreateClientsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientsAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientsRepository->create($input);

        return $this->sendResponse(new ClientsResource($clients), 'Clients saved successfully');
    }

    /**
     * Display the specified Clients.
     * GET|HEAD /clients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clients $clients */
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            return $this->sendError('Clients not found');
        }

        return $this->sendResponse(new ClientsResource($clients), 'Clients retrieved successfully');
    }

    /**
     * Update the specified Clients in storage.
     * PUT/PATCH /clients/{id}
     *
     * @param int $id
     * @param UpdateClientsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Clients $clients */
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            return $this->sendError('Clients not found');
        }

        $clients = $this->clientsRepository->update($input, $id);

        return $this->sendResponse(new ClientsResource($clients), 'Clients updated successfully');
    }

    /**
     * Remove the specified Clients from storage.
     * DELETE /clients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Clients $clients */
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            return $this->sendError('Clients not found');
        }

        $clients->delete();

        return $this->sendSuccess('Clients deleted successfully');
    }
}
