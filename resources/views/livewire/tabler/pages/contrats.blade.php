<div>
    @component('components.tabler.header', ['title'=>'Contrats', 'subtitle'=>'Immo'])

    @endcomponent

    <div class="table-responsive bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Appartement</th>
                    <th style="width: 10px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="">
                        <td scope="row">
                            {{ $client->prenom }} {{ $client->nom }}
                        </td>
                        <td>R1C2</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('tabler.contrat_pdf',['client_id', $client->id]) }}" target="_blank">PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>
