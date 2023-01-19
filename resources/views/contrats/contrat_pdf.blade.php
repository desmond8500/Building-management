@extends('contrats.contrat_layout')

@section('content')
    <h3 class="text-center">ENGAGEMENT DE LOCATION VERBALE A DUREE DETERMINEE <br> (01 AN RENOUVELABLE)</h3>

    <div class="text-justify">
        Entre: Le bailleur <b>M. Momar DIAGNE</b>, <b>PC n° 327812 du 09 Juin 1999</b> et Le preneur, <b>{{ $client->nom ?? "Prénom et nom" }}</b>,
        <b>{{ $client->ci ?? "CI 00000 0000 00000" }}</b>, délivrée <b>{{ $client->delivrance ?? "00 00 0000" }}</b> qui s’engage à prendre en
        location les locaux dont la désignation suit : <b>{{ $home->adress ?? "adresse" }}</b> , <b>{{ $client->local ?? 'Appartement 11' }}</b>,
        sans qu’il soit nécessaire de désigner les lieux plus amplement, les connaissant pour les avoir visités.
    </div>

    <div class="text-justify">
        Cette location qui prendra effet le <b>{{ $debut_contrat ?? "01 janvier 2019" }}</b> est usage d’habitation. Elle est consentie au prix
        de <b>100000 francs CFA</b> payable par terme mensuel et d’avance au plus tard le 05 de chaque mois.
    </div>

    <div class="text-justify">
        A cela il faut ajouter:
        <ul>
            <li>a contribution mensuelle aux frais de vidange et de curage de la fosse sceptique qui est de 2 000 francs par mois</li>
            <li>la taxe d’enregistrement sur location de 24000 francs à verser à la signature du présent contrat</li>
        </ol>
    </div>

    <div class="text-justify">
        Le présent contrat est renouvelable annuellement. Le loyer est portable et non quérable à Mr
        Momar DIAGNE, Villa n° 179A, cité Hilal, km 8, BBC Dakar. Le preneur reconnait par la présente,
        prendre les lieux loués en bon état de réparations locatives et s’engage en conséquence à le
        rendre au moment de son départ, en parfait état d’entretien.
    </div>

    <div class="text-bold text-underline mt-2">CAUTION :</div>
    <div class="text-justify">
        Le preneur verse à titre de caution la somme de <b>200 000 F CFA</b> Cette somme non productible d’intérêt, ne sera remboursée
        qu’après :
        <ol style="list-style-type:lower-alpha">
           <li>
                Avoir restitué les lieux, loués en parfait état locatif (notamment révision installation de
                plomberie, électricité, réfection des peintures et dans tous les cas la remise des clefs).
           </li>
           <li>
                Avoir payé son loyer jusqu'à la date échue du préavis ou du mois de la remise des clefs si
                celle-ci est postérieure au préavis.
           </li>
           <li>
                Avoir repris la peinture (la chambre que vous venez de louer a été entièrement repeinte)
           </li>
        </ol>
        <div class="text-justify">
            A défaut il sera prélevé sur la dite caution les sommes correspondantes aux frais de remise en
            état des lieux, ainsi que montant des factures d’eau, d’électricité, et de vidange non réglées. Il
            demeure bien entendu que ces formalités de remise en état et de résiliation des travaux devront
            être effectuées pendant la période du préavis
        </div>
    </div>

    <div class="text-bold text-underline mt-2">CAUSE RESOLUTOIRE :</div>
    <div class="text-justify">
        A défaut il sera prélevé sur la dite caution les sommes correspondantes aux frais de remise en état deslieux, ainsi que
        montant des factures d’eau, d’électricité, et de vidange non réglées. Il demeure bien entendu que ces formalités de
        remise en état et de résiliation des travaux devront être effectuées pendant la période du préavis
        toutes offres ou consignes ultérieures et attributions est donnée au président du tribunal statuant en référépour
        ordonner dans ce vas l’expulsion du locataire. <br>
        En cas de procédure, les frais de celle-ci et les honoraires de l’avocat sont à la charge du locataire.
    </div>

    <div class="text-right mt-1">Fait à Dakar, le 19 janvier 2023</div>

    <table class="table table-white mt-2">
        <tr>
            <td class="td-white">LE PRENEUR</td>
            <td class="td-white text-right ">LE BAILLEUR</td>
        </tr>
    </table>



@endsection
