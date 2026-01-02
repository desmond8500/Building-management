@extends('contrats.contrat_layout')

@section('title')
Contrat
@endsection

@section('content')

    @foreach ($contrats as $contrat)
        @if (!$contrat->fin)
            <h3 class="text-center">ENGAGEMENT DE LOCATION VERBALE A DUREE DETERMINEE <br> (01 AN RENOUVELABLE)</h3>

            <div class="text-justify">
                Entre: Le bailleur <b>M. Momar DIAGNE</b>, <b>PC n° 327812 du 09 Juin 1999</b> et Le preneur,
                <b> @if ($contrat->client->genre == 'homme') M. @else Mme @endif {{ $contrat->client->prenom }} {{ strtoupper($contrat->client->nom) }} </b>,
                CI N° <b>{{ $contrat->client->ci }}</b>,
                @if ($contrat->client->delivre)
                    délivrée le<b> {{ $contrat->client->delivre ?? "00 00 0000" }}</b>
                @endif
                qui s’engage à prendre en location
                les locaux dont la désignation suit : <b>{{ $contrat->appartement->adresse }}</b> ,<b>{{ $contrat->appartement->nom ?? 'Appartement 11' }}</b>,
                sans qu’il soit nécessaire de désigner les lieux plus amplement, les connaissant pour les avoir visités.
            </div>

            <div class="text-justify">
                Cette location qui prendra effet le <b>01 février {{ $annee+1 }}</b> est à usage d’habitation. Elle est consentie au prix
                de <b>{{ number_format($contrat->montant, 0, ',', ' ') }} francs CFA</b> payable par terme mensuel au plus tard le <b>05 de chaque mois</b>.
            </div>

            <div class="text-justify mt-1">
                A cela il faut ajouter la taxe d’enregistrement (timbres 6000F) sur location
                {{-- de <b>{{ number_format($taxe, 0, ',', ' ') }} Francs CFA</b>  --}}
                à verser à la signature du présent contrat.
            </div>

            <div class="text-justify mt-1">
                Le présent contrat est renouvelable annuellement.
                Le preneur reconnaît par la présente,
                prendre les lieux loués en bon état de réparations locatives et s’engage en conséquence à le
                rendre au moment de son départ, en parfait état d’entretien.
                Il s'engage à satisfaire à toutes les charges de voirie de police et d'hygiène qui incombe aux locataires, y compris
                l'entretien et le remplacement des grillages et les moutisquaires endommagés, afin qu'aucun recours ne puisse être
                exercé à cet égard par le propriétaire.
            </div>

            <div class="text-bold text-underline mt-2 mb-0">CAUTION :</div>
            <div class="text-justify">
                Le preneur verse à titre de caution la somme de <b>{{ number_format($contrat->montant*2, 0, ',', ' ')}}F CFA</b>.
                Cette somme non productible d’intérêt, ne sera remboursée qu’après :
                <ol style="list-style-type:lower-alpha">
                <li>
                    Avoir restitué les lieux, loués en parfait état locatif (notamment révision installation de
                    plomberie, électricité, réfection des peintures et dans tous les cas la remise des clefs).
                </li>
                <li>
                    Avoir payé son loyer jusqu'à la date échue du préavis ou du mois de la remise des clefs si
                    celle-ci est postérieure au préavis.
                </li>
                </ol>
                <div class="text-justify">
                    A défaut il sera prélevé sur ladite caution les sommes correspondantes aux frais de remise en
                    état des lieux, ainsi que le montant des factures d’eau, d’électricité, et de vidange non réglées. Il
                    demeure bien entendu que ces formalités de remise en état et de résiliation des travaux devront
                    être effectuées pendant la période du préavis.
                </div>
            </div>

            <div class="text-bold text-underline mt-2 mb-0">CAUSE RESOLUTOIRE :</div>
            <div class="text-justify">
                A défaut de paiement à son échéance d’un seul terme de loyer ou d’inexécution de l’une des conditions
                qui précédent, le présent contrat sera résilié de plein droit trente (30) jours après un simple
                commandement de payer ou de mise en demeure d’exécuter resté sans qu’il soit besoin de remplir
                d’autres formalités judiciaires. Une simple ordonnance de référé autorisant l’expulsion et nonobstant
                toutes offres ou consignes ultérieures et attributions est donnée au président du tribunal statuant en référé
                pour ordonner dans ce cas l’expulsion du locataire.
                <br>
                Le locataire s'engage à respecter la tranquillité des autres résidants de l'immeuble et à éviter tout bruit excessif, notamment dans les couloirs et les parties communes, qui pourraient perturber la quiétude des autres occupants.
                <br>
                Le locataire s'engage à ne pas utiliser le Bien pour des activités commerciales ou professionnelles qui nécessitent l'accès de la clientèle à la maison. Il est strictement interdit de recevoir des clients ou de faire des affaires au domicile, à l'exception des activités professionnelles à distance qui n'impliquent pas de visites de clients.
                <br>
                En cas de procédure, les frais de celle-ci et les honoraires de l’avocat sont à la charge du locataire.
            </div>

            <div class="text-right mt-1">Fait à Dakar,
                @if ($contrat->date)

                @php
                $ndate = explode("-",$contrat->date);
                @endphp
                    {{ "$ndate[2] $ndate[1] $ndate[0]" }}
                @else
                    {{ $date_global->value }}
                @endif
            </div>

            <table class="table table-white mt-2">
                <tr>
                    <td class="td-white">LE PRENEUR</td>
                    <td class="td-white text-right ">LE BAILLEUR</td>
                </tr>
            </table>

            <div style="page-break-after: always;"></div>

        @endif
    @endforeach




@endsection
