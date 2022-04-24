<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactureAPIRequest;
use App\Http\Requests\API\UpdateFactureAPIRequest;
use App\Models\Facture;
use App\Repositories\FactureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FactureResource;
use Response;

/**
 * Class FactureController
 * @package App\Http\Controllers\API
 */

class FactureAPIController extends AppBaseController
{
    /** @var  FactureRepository */
    private $factureRepository;

    public function __construct(FactureRepository $factureRepo)
    {
        $this->factureRepository = $factureRepo;
    }

    /**
     * Display a listing of the Facture.
     * GET|HEAD /factures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factures = $this->factureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FactureResource::collection($factures), 'Factures retrieved successfully');
    }

    /**
     * Store a newly created Facture in storage.
     * POST /factures
     *
     * @param CreateFactureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactureAPIRequest $request)
    {
        $input = $request->all();

        $facture = $this->factureRepository->create($input);

        return $this->sendResponse(new FactureResource($facture), 'Facture saved successfully');
    }

    /**
     * Display the specified Facture.
     * GET|HEAD /factures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError('Facture not found');
        }

        return $this->sendResponse(new FactureResource($facture), 'Facture retrieved successfully');
    }

    /**
     * Update the specified Facture in storage.
     * PUT/PATCH /factures/{id}
     *
     * @param int $id
     * @param UpdateFactureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactureAPIRequest $request)
    {
        $input = $request->all();

        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError('Facture not found');
        }

        $facture = $this->factureRepository->update($input, $id);

        return $this->sendResponse(new FactureResource($facture), 'Facture updated successfully');
    }

    /**
     * Remove the specified Facture from storage.
     * DELETE /factures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError('Facture not found');
        }

        $facture->delete();

        return $this->sendSuccess('Facture deleted successfully');
    }
}
