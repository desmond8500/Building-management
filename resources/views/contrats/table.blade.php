<div class="table-responsive-sm">
    <table class="table table-striped" id="contrats-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Appartement Id</th>
        <th>Debut</th>
        <th>Fin</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contrats as $contrat)
            <tr>
                <td>{{ $contrat->client_id }}</td>
            <td>{{ $contrat->appartement_id }}</td>
            <td>{{ $contrat->debut }}</td>
            <td>{{ $contrat->fin }}</td>
                <td>
                    {!! Form::open(['route' => ['contrats.destroy', $contrat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contrats.show', [$contrat->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('contrats.edit', [$contrat->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>