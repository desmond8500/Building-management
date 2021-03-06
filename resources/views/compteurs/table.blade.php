<div class="table-responsive-sm">
    <table class="table table-striped" id="compteurs-table">
        <thead>
            <tr>
                <th>Appartement Id</th>
        <th>Type</th>
        <th>Reference</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteurs as $compteur)
            <tr>
                <td>{{ $compteur->appartement_id }}</td>
            <td>{{ $compteur->type }}</td>
            <td>{{ $compteur->reference }}</td>
                <td>
                    {!! Form::open(['route' => ['compteurs.destroy', $compteur->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteurs.show', [$compteur->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('compteurs.edit', [$compteur->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>