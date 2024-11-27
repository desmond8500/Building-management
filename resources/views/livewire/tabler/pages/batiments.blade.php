<div>
    @component('components.tabler.header', ['title'=>'Batiments', 'subtitle'=>'Liste des batiments'])
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBatiment">
            <i class="ti ti-plus"></i>
            Batiment
        </button>
    @endcomponent

    <div class="row g-2">
        @foreach ($batiments->sortBy('name') as $batiment)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ $batiment->name }}</h2>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-icon" wire:click="edit('{{ $batiment->id }}')">
                                <i class="ti ti-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($batiment_id)
                            <div class="row g-2">
                                @include('_form.batiment_form')

                                <div class="col-md-12">
                                    <button class="btn btn-secondary" wire:click="close">Fermer</button>
                                    <button class="btn btn-primary" wire:click="update">Modifier</button>
                                </div>
                            </div>
                        @else
                            <h2>Appartements</h2>
                            @foreach ($batiment->appartements->sortBy('nom') as $appartement)
                                <a href="{{ route('tabler.appartement',['appartement_id'=>$appartement->id]) }}" class="btn btn-primary mb-1" >{{ $appartement->nom }}</a>
                            @endforeach
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h2>Contrats</h2>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-primary" href="{{ route('tabler.some_contrats_pdf',['batiment_id'=>$batiment->id]) }}" target="_blank">PDF</a>
                                </div>
                            </div>
                            @foreach ($batiment->contrats->sortby('client.nom') as $contrat)
                                <a href="{{ route('tabler.contrat',['contrat_id'=>$contrat->id]) }}" class="btn btn-primary mb-1" >{{ $contrat->client->prenom }} - {{ $contrat->client->nom }}</a>
                            @endforeach
                        @endif

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal modal-blur fade" id="addBatiment" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent='store'>
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un batiment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('_form.batiment_form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addBatiment").modal('hide'); }) </script>
</div>
