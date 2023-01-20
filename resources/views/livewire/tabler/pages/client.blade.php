<div class="row">
    <div class="col-md-12">
        @component('components.tabler.header', ['title'=>'Client', 'subtitle'=>'Immo'])
            <button class="btn btn-primary" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
              Appartement
            </button>
        @endcomponent
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="title">Client</div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Prénom</div> <div>{{ $client->prenom }}</div>
                </div>
                <div class="d-flex justify-content-between border-top mt-1 pt-1">
                    <div class="fw-bold">Nom</div> <div>{{ $client->nom }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        @foreach ($client->apparts() as $appartement)
            <div>{{ $appartement->nom }}</div>
        @endforeach

        @dump($client->apparts())
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un appartement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="fieldset">
                <div class="mb-3">
                    <label class="form-label">Appartement</label>
                    <select wire:model.defer="appart_id" class="form-select">
                        <option value="0">Sélectionner un appartement</option>
                        @foreach ($apparts as $appart)
                            <option value="{{ $appart->id }}">{{ $appart->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="addAppart()">Affecter l'appartement</button>
          </div>
        </div>
      </div>
    </div>



</div>
