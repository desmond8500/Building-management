<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContratAPIRequest;
use App\Http\Requests\API\UpdateContratAPIRequest;
use App\Models\Contrat;
use App\Repositories\ContratRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ContratResource;
use Response;

/**
 * Class ContratController
 * @package App\Http\Controllers\API
 */

class ContratAPIController extends AppBaseController
{
    /** @var  ContratRepository */
    private $contratRepository;

    public function __construct(ContratRepository $contratRepo)
    {
        $this->contratRepository = $contratRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contrats",
     *      summary="Get a listing of the Contrats.",
     *      tags={"Contrat"},
     *      description="Get all Contrats",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Contrat")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $contrats = $this->contratRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ContratResource::collection($contrats), 'Contrats retrieved successfully');
    }

    /**
     * @param CreateContratAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contrats",
     *      summary="Store a newly created Contrat in storage",
     *      tags={"Contrat"},
     *      description="Store Contrat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contrat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contrat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contrat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContratAPIRequest $request)
    {
        $input = $request->all();

        $contrat = $this->contratRepository->create($input);

        return $this->sendResponse(new ContratResource($contrat), 'Contrat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contrats/{id}",
     *      summary="Display the specified Contrat",
     *      tags={"Contrat"},
     *      description="Get Contrat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contrat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contrat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Contrat $contrat */
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            return $this->sendError('Contrat not found');
        }

        return $this->sendResponse(new ContratResource($contrat), 'Contrat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContratAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contrats/{id}",
     *      summary="Update the specified Contrat in storage",
     *      tags={"Contrat"},
     *      description="Update Contrat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contrat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contrat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contrat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Contrat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContratAPIRequest $request)
    {
        $input = $request->all();

        /** @var Contrat $contrat */
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            return $this->sendError('Contrat not found');
        }

        $contrat = $this->contratRepository->update($input, $id);

        return $this->sendResponse(new ContratResource($contrat), 'Contrat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contrats/{id}",
     *      summary="Remove the specified Contrat from storage",
     *      tags={"Contrat"},
     *      description="Delete Contrat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contrat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Contrat $contrat */
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            return $this->sendError('Contrat not found');
        }

        $contrat->delete();

        return $this->sendSuccess('Contrat deleted successfully');
    }
}
