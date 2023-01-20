<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContratRequest;
use App\Http\Requests\UpdateContratRequest;
use App\Repositories\ContratRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContratController extends AppBaseController
{
    /** @var ContratRepository $contratRepository*/
    private $contratRepository;

    public function __construct(ContratRepository $contratRepo)
    {
        $this->contratRepository = $contratRepo;
    }

    /**
     * Display a listing of the Contrat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contrats = $this->contratRepository->paginate(10);

        return view('contrats.index')
            ->with('contrats', $contrats);
    }

    /**
     * Show the form for creating a new Contrat.
     *
     * @return Response
     */
    public function create()
    {
        return view('contrats.create');
    }

    /**
     * Store a newly created Contrat in storage.
     *
     * @param CreateContratRequest $request
     *
     * @return Response
     */
    public function store(CreateContratRequest $request)
    {
        $input = $request->all();

        $contrat = $this->contratRepository->create($input);

        Flash::success('Contrat saved successfully.');

        return redirect(route('contrats.index'));
    }

    /**
     * Display the specified Contrat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            Flash::error('Contrat not found');

            return redirect(route('contrats.index'));
        }

        return view('contrats.show')->with('contrat', $contrat);
    }

    /**
     * Show the form for editing the specified Contrat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            Flash::error('Contrat not found');

            return redirect(route('contrats.index'));
        }

        return view('contrats.edit')->with('contrat', $contrat);
    }

    /**
     * Update the specified Contrat in storage.
     *
     * @param int $id
     * @param UpdateContratRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratRequest $request)
    {
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            Flash::error('Contrat not found');

            return redirect(route('contrats.index'));
        }

        $contrat = $this->contratRepository->update($request->all(), $id);

        Flash::success('Contrat updated successfully.');

        return redirect(route('contrats.index'));
    }

    /**
     * Remove the specified Contrat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contrat = $this->contratRepository->find($id);

        if (empty($contrat)) {
            Flash::error('Contrat not found');

            return redirect(route('contrats.index'));
        }

        $this->contratRepository->delete($id);

        Flash::success('Contrat deleted successfully.');

        return redirect(route('contrats.index'));
    }
}
