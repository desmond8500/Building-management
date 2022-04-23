<div class="table-responsive-sm">
    <table class="table table-striped" id="appartements-table">
        <thead>
            <tr>
                <th>Nom</th>
        <th>Numero</th>
        <th>Niveau</th>
        <th>Adresse</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($appartements as $appartement)
            <tr>
                <td>{{ $appartement->nom }}</td>
            <td>{{ $appartement->numero }}</td>
            <td>{{ $appartement->niveau }}</td>
            <td>{{ $appartement->adresse }}</td>
                <td>
                    {!! Form::open(['route' => ['appartements.destroy', $appartement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('appartements.show', [$appartement->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('appartements.edit', [$appartement->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>