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

    </div>

</div>
