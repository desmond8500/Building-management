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
            'taxe' => $contrat->montant*0.24 + 2000,
            'caution' => $contrat->montant*3,
            // 'jour' => date('d F Y')
        );

        $pdf = Pdf::loadView('contrats.contrat_pdf', $data);

        return $pdf->stream();
    }
}