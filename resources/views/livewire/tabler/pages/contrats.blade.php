<div>
    @component('components.tabler.header', ['title'=>'Contrats', 'subtitle'=>'Immo'])

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Contrat
    </button>

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
            {{-- @dump($selected) --}}
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
                        @foreach ($contrats as $contrat)
                        @if ($contrat_id == $contrat->id)
                            <tr class="">
                                <td colspan="4">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Client</label>
                                            <select class="form-select" wire:model.defer="client_id">
                                                <option value="0">Sélectionnez un client</option>
                                                @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
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
                                    <input type="checkbox" wire:click="selectContract('{{ $contrat->id }}')">
                                </td>
                                <td scope="row">
                                    {{ $contrat->client->prenom }} {{ $contrat->client->nom }}
                                </td>
                                <td>{{ $contrat->appartement->nom }}</td>
                                <td>{{ number_format($contrat->montant, 0, ',', ' ') }} F</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" wire:click="edit_contract('{{ $contrat->id }}')">Editer</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('tabler.contrat_pdf',['contrat_id'=>$contrat->id]) }}" target="_blank">PDF</a>
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
