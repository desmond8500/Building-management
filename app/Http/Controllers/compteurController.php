<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecompteurRequest;
use App\Http\Requests\UpdatecompteurRequest;
use App\Repositories\compteurRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class compteurController extends AppBaseController
{
    /** @var compteurRepository $compteurRepository*/
    private $compteurRepository;

    public function __construct(compteurRepository $compteurRepo)
    {
        $this->compteurRepository = $compteurRepo;
    }

    /**
     * Display a listing of the compteur.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteurs = $this->compteurRepository->paginate(10);

        return view('compteurs.index')
            ->with('compteurs', $compteurs);
    }

    /**
     * Show the form for creating a new compteur.
     *
     * @return Response
     */
    public function create()
    {
        return view('compteurs.create');
    }

    /**
     * Store a newly created compteur in storage.
     *
     * @param CreatecompteurRequest $request
     *
     * @return Response
     */
    public function store(CreatecompteurRequest $request)
    {
        $input = $request->all();

        $compteur = $this->compteurRepository->create($input);

        Flash::success('Compteur saved successfully.');

        return redirect(route('compteurs.index'));
    }

    /**
     * Display the specified compteur.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            Flash::error('Compteur not found');

            return redirect(route('compteurs.index'));
        }

        return view('compteurs.show')->with('compteur', $compteur);
    }

    /**
     * Show the form for editing the specified compteur.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            Flash::error('Compteur not found');

            return redirect(route('compteurs.index'));
        }

        return view('compteurs.edit')->with('compteur', $compteur);
    }

    /**
     * Update the specified compteur in storage.
     *
     * @param int $id
     * @param UpdatecompteurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompteurRequest $request)
    {
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            Flash::error('Compteur not found');

            return redirect(route('compteurs.index'));
        }

        $compteur = $this->compteurRepository->update($request->all(), $id);

        Flash::success('Compteur updated successfully.');

        return redirect(route('compteurs.index'));
    }

    /**
     * Remove the specified compteur from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteur = $this->compteurRepository->find($id);

        if (empty($compteur)) {
            Flash::error('Compteur not found');

            return redirect(route('compteurs.index'));
        }

        $this->compteurRepository->delete($id);

        Flash::success('Compteur deleted successfully.');

        return redirect(route('compteurs.index'));
    }
}
