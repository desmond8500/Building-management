<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Client;
use App\Models\Contrat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show_contrat($contrat_id)
    {
        $contrat = Contrat::find($contrat_id);
        $client = Client::find($contrat->client->id);
        $appartement = Appartement::find($contrat->appartement->id);
        $data = array(
            "client" => $client,
            "appart" => $appartement,
            "contrat" => $contrat,
            "annee" => date('Y'),
            'taxe' => $contrat->montant*0.24 + 6000,
            'caution' => $contrat->montant*3,
            // 'jour' => date('d F Y')
        );

        $pdf = Pdf::loadView('contrats.contrat_pdf', $data);

        return $pdf->stream();
    }

    public function show_clients()
    {
        $clients = Client::where('statut', 1)->get();

        $data = array(
            "clients" => $clients,
        );

        $pdf = Pdf::loadView('clients.clients_pdf', $data);

        return $pdf->stream();
    }

    public function show_appartements()
    {
        $appartements = Appartement::where('statut', 1)->get();

        $data = array(
            "appartements" => $appartements,
        );

        $pdf = Pdf::loadView('appartements.appartements_pdf', $data);

        return $pdf->stream();
    }


}
