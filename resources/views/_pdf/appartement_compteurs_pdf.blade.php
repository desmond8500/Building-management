<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/pdf.css">
    <title>Document</title>
</head>
<body>

    <h1>Compteurs</h1>

    <table class="table table-responsive">
        <thead>
            <tr class="bg-blue">
                <th>#</th>
                <th class="text-nowrap">Type</th>
                <th class="text-nowrap">Numéro</th>
                <th class="text-nowrap">Appartement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compteurs as $key => $compteur)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td class="text-center">{{ $compteur->type }}</td>
                    <td>{{ $compteur->reference }}</td>
                    <td>{{ $compteur->appartement->nom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>


