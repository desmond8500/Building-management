<div class="row">
    <div class="col-md-12">
        @component('components.tabler.header', ['title'=>'Client', 'subtitle'=>'Immo'])

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
