<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateappartementRequest;
use App\Http\Requests\UpdateappartementRequest;
use App\Repositories\appartementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class appartementController extends AppBaseController
{
    /** @var appartementRepository $appartementRepository*/
    private $appartementRepository;

    public function __construct(appartementRepository $appartementRepo)
    {
        $this->appartementRepository = $appartementRepo;
    }

    /**
     * Display a listing of the appartement.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $appartements = $this->appartementRepository->paginate(10);

        return view('appartements.index')
            ->with('appartements', $appartements);
    }

    /**
     * Show the form for creating a new appartement.
     *
     * @return Response
     */
    public function create()
    {
        return view('appartements.create');
    }

    /**
     * Store a newly created appartement in storage.
     *
     * @param CreateappartementRequest $request
     *
     * @return Response
     */
    public function store(CreateappartementRequest $request)
    {
        $input = $request->all();

        $appartement = $this->appartementRepository->create($input);

        Flash::success('Appartement saved successfully.');

        return redirect(route('appartements.index'));
    }

    /**
     * Display the specified appartement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            Flash::error('Appartement not found');

            return redirect(route('appartements.index'));
        }

        return view('appartements.show')->with('appartement', $appartement);
    }

    /**
     * Show the form for editing the specified appartement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            Flash::error('Appartement not found');

            return redirect(route('appartements.index'));
        }

        return view('appartements.edit')->with('appartement', $appartement);
    }

    /**
     * Update the specified appartement in storage.
     *
     * @param int $id
     * @param UpdateappartementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateappartementRequest $request)
    {
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            Flash::error('Appartement not found');

            return redirect(route('appartements.index'));
        }

        $appartement = $this->appartementRepository->update($request->all(), $id);

        Flash::success('Appartement updated successfully.');

        return redirect(route('appartements.index'));
    }

    /**
     * Remove the specified appartement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $appartement = $this->appartementRepository->find($id);

        if (empty($appartement)) {
            Flash::error('Appartement not found');

            return redirect(route('appartements.index'));
        }

        $this->appartementRepository->delete($id);

        Flash::success('Appartement deleted successfully.');

        return redirect(route('appartements.index'));
    }
}
