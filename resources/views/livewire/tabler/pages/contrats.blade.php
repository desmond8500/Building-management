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

    <div class="row">

        <div class="col-md-5">
            @foreach ($selected as $key => $item)
                <div class="card p-2 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">{{ $item['client']['prenom'] }} {{ $item['client']['nom'] }}</div>
                        <div>
                            <button class="btn btn-danger" wire:click="remove_contract('{{ $key }}')">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-7">
            <div class="table-responsive bg-white  mt-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Appartement</th>
                            <th scope="col">Montant</th>
                            <th style="width: 10px">Editer</th>
                            <th style="width: 10px">Contrat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contrats as $key => $contrat)
                        @if ($contrat_id == $contrat->id)
                            <tr class="">
                                <td colspan="4">
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
                                </td>
                            </tr>
                        @else
                            <tr class="">
                                <td scope="row">
                                    {{ $key+1 }}
                                    {{-- <button class="btn btn-primary" wire:click="selectContract('{{ $contrat->id }}')">add</button> --}}
                                </td>
                                <td scope="row">
                                    {{ $contrat->client->prenom }} {{ $contrat->client->nom }}
                                </td>
                                <td>
                                    {{ $contrat->appartement->nom }} <br>
                                    {{ $contrat->appartement->adresse }}
                                </td>
                                <td>{{ number_format($contrat->montant, 0, ',', ' ') }} F</td>
                                <td>
                                    <a class="btn btn-sm btn-primary rounded" wire:click="edit_contract('{{ $contrat->id }}')">
                                        <i class="ti ti-edit"></i>    Editer
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary rounded" href="{{ route('tabler.contrat_pdf',['contrat_id'=>$contrat->id]) }}" target="_blank">PDF</a>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
