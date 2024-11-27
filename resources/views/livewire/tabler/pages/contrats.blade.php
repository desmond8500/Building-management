<div>
    @component('components.tabler.header', ['title'=>'Contrats', 'subtitle'=>'Immo'])

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Contrat
    </button>

    <a class="btn btn-primary" href="{{ route('tabler.all_contrat_pdf') }}" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path> <line x1="9" y1="9" x2="10" y2="9"></line> <line x1="9" y1="13" x2="15" y2="13"></line> <line x1="9" y1="17" x2="15" y2="17"></line> </svg>
        PDF
    </a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un contrat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body form-fieldset">
            <form class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Client</label>
                    <select class="form-select" wire:model.defer="client_id">
                        <option value="0">Sélectionnez un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->prenom  }} {{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Appartement</label>
                    <select class="form-select" wire:model.defer="appartement_id">
                        <option value="0">Sélectionnez un Appartement</option>
                        @foreach ($appartements as $appartement)
                            <option value="{{ $appartement->id }}">{{ $appartement->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Montant</label>
                    <input type="text" class="form-control" wire:model.defer="montant" placeholder="montant">
                </div>

                <div class="text-end">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="add_contract()">Ajouter</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @endcomponent

    <div class="row g-2">
        @foreach ($contrats as $key => $contrat)

                @if ($contrat_id == $contrat->id)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Editer un contrat</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Client</label>
                                        <select class="form-select" wire:model.defer="client_id">
                                            <option value="0">Sélectionnez un client</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Appartement</label>
                                        <select class="form-select" wire:model.defer="appartement_id">
                                            <option value="0">Sélectionnez un Appartement</option>
                                            @foreach ($appartements as $appartement)
                                            <option value="{{ $appartement->id }}">{{ $appartement->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Montant</label>
                                        <input type="text" class="form-control" wire:model.defer="montant" placeholder="montant">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Type</label>
                                        <select class="form-select" wire:model.defer="type">
                                            <option value="0">Select</option>
                                            <option value="habitation">Habitation</option>
                                            <option value="bureau">Bureau</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" wire:model.defer="date" placeholder="Date">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Date de début de contrat</label>
                                        <input type="date" class="form-control" wire:model.defer="debut" placeholder="Date">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Date de fin de contrat</label>
                                        <input type="date" class="form-control" wire:model.defer="fin" placeholder="Date">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Signature</label>
                                        <select class="form-select" wire:model.defer="sign1">
                                            <option value="">Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-secondary" wire:click="$set('contrat_id', 0)">Fermer</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                            wire:click="update_contract()">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">{{ $contrat->client->prenom }} {{ $contrat->client->nom }}</div>
                                <div class="card-actions">
                                    <a class="btn btn-icon btn-primary " wire:click="edit_contract('{{ $contrat->id }}')">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a class="btn btn-primary rounded" href="{{ route('tabler.contrat_pdf',['contrat_id'=>$contrat->id]) }}"
                                        target="_blank">PDF</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-2 row-deck">
                                    <div class="col text-primary fw-bold" style="font-size: 20px">
                                        {{ $contrat->appartement->nom }} <br>
                                    </div>
                                    <div class="col-auto">
                                        <span style="font-size: 20px">{{ number_format($contrat->montant, 0, ',', ' ') }} F</span>
                                    </div>
                                    <div class="col-12">
                                        {{ $contrat->appartement->adresse }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        @endforeach


    </div>

</div>
