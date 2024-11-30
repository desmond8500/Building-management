<div>
    @component('components.tabler.header', ['title'=>'Contrat', 'subtitle'=>'Immo'])
        <a href="{{ route('tabler.contrat_pdf',['contrat_id'=>$contrat->id]) }}" class="btn btn-primary" target="_blank">Contrat PDF</a>
    @endcomponent
    <div class="row g-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title fw-bold">Client</h2>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    <div class="border-bottom mb-2">
                        <div style="font-size: 13px">Client</div>
                        <div class="fw-bold">{{ $contrat->client->prenom }} {{ strtoupper($contrat->client->nom) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Carte d'identité / Passeport</div>
                                <div class="fw-bold">{{ $contrat->client->ci }}</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Date de délivrance</div>
                                <div class="fw-bold">{{ $contrat->client->delivre }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title fw-bold">Contrat</h2>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    <div class="border-bottom mb-2">
                        <div style="font-size: 13px">Date du contrat</div>
                        <div class="fw-bold">{{ $contrat->date }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Date de début</div>
                                <div class="fw-bold">{{ $contrat->debut }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Date de fin</div>
                                <div class="fw-bold">{{ $contrat->fin }}</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Montant</div>
                                <div class="fw-bold">{{ number_format($contrat->montant, 0, ',', ' ') }} F CFA</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="border-bottom mb-2">
                                <div style="font-size: 13px">Caution</div>
                                <div class="fw-bold">{{ number_format($contrat->montant*2, 0, ',', ' ') }} F CFA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title fw-bold">Appartement</h2>
                    <div class="card-actions">

                    </div>
                </div>
                <div class="card-body">
                    <div class="border-bottom mb-2">
                        <div style="font-size: 13px">Appartement</div>
                        <div class="fw-bold">{{ $contrat->appartement->nom }} / {{ $contrat->appartement->numero }}</div>
                    </div>
                    <div class="border-bottom mb-2">
                        <div style="font-size: 13px">Montant</div>
                        <div class="fw-bold">{{ number_format($contrat->appartement->montant, 0, ',', ' ') }} F CFA</div>
                    </div>
                    <div class="border-bottom mb-2">
                        <div style="font-size: 13px">Type</div>
                        <div class="fw-bold">{{ $contrat->appartement->type }} </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
