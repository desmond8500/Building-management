<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
use App\Repositories\FactureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FactureController extends AppBaseController
{
    /** @var FactureRepository $factureRepository*/
    private $factureRepository;

    public function __construct(FactureRepository $factureRepo)
    {
        $this->factureRepository = $factureRepo;
    }

    /**
     * Display a listing of the Facture.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $factures = $this->factureRepository->paginate(10);

        return view('factures.index')
            ->with('factures', $factures);
    }

    /**
     * Show the form for creating a new Facture.
     *
     * @return Response
     */
    public function create()
    {
        return view('factures.create');
    }

    /**
     * Store a newly created Facture in storage.
     *
     * @param CreateFactureRequest $request
     *
     * @return Response
     */
    public function store(CreateFactureRequest $request)
    {
        $input = $request->all();

        $facture = $this->factureRepository->create($input);

        Flash::success('Facture saved successfully.');

        return redirect(route('factures.index'));
    }

    /**
     * Display the specified Facture.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            Flash::error('Facture not found');

            return redirect(route('factures.index'));
        }

        return view('factures.show')->with('facture', $facture);
    }

    /**
     * Show the form for editing the specified Facture.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            Flash::error('Facture not found');

            return redirect(route('factures.index'));
        }

        return view('factures.edit')->with('facture', $facture);
    }

    /**
     * Update the specified Facture in storage.
     *
     * @param int $id
     * @param UpdateFactureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactureRequest $request)
    {
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            Flash::error('Facture not found');

            return redirect(route('factures.index'));
        }

        $facture = $this->factureRepository->update($request->all(), $id);

        Flash::success('Facture updated successfully.');

        return redirect(route('factures.index'));
    }

    /**
     * Remove the specified Facture from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            Flash::error('Facture not found');

            return redirect(route('factures.index'));
        }

        $this->factureRepository->delete($id);

        Flash::success('Facture deleted successfully.');

        return redirect(route('factures.index'));
    }
}
