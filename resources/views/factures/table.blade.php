<div class="table-responsive-sm">
    <table class="table table-striped" id="factures-table">
        <thead>
            <tr>
                <th>Compteur Id</th>
        <th>Montant</th>
        <th>Date</th>
        <th>Facture</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->compteur_id }}</td>
            <td>{{ $facture->montant }}</td>
            <td>{{ $facture->date }}</td>
            <td>{{ $facture->facture }}</td>
                <td>
                    {!! Form::open(['route' => ['factures.destroy', $facture->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('factures.show', [$facture->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('factures.edit', [$facture->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>