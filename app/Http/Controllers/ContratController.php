<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public $client_id;

    public function __contruct($client_id)
    {
        $this->client_id = $client_id;
    }

    public function show_contrat()
    {
        $client = Client::find($this->client_id);
        var_dump($client);
        $data = [
            "home" => [
                "address" => "Villa n° 180, Cité HILAL",
                "debut_contrat" => '01 janvier 2023'
            ],
            "client" => [
                // 'prenom' => $client->prenom,
                // 'nom' => $client->nom,
            ]
        ];

        $pdf = Pdf::loadView('contrats.contrat_pdf', $data);

        return $pdf->stream();
    }
}
