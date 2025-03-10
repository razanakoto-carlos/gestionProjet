<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white
                shadow-md sm:rounded-t">
            <div class="flex justify-center text-2xl my-3 text-gray-600 font-semibold">
                <h2>CIRCUIT D'APPROBATION DE PAIEMENTS</h2>
            </div>
            <div class="flex justify-center text-2xl my-3 text-gray-600 font-semibold">
                <h4>
                    NOM DU PROJET: {{ $paiement->project->nom_projet }}
                </h4>
            </div>
            <div class="flex justify-end mb-2">
                <a href="{{ route('pdfPaiement.exporter', $paiement->id) }}"
                    class="flex items-center justify-center m-3 ml-24 transition ease-in-out bg-blue-500 hover:bg-blue-600 px-4 py-2 border h-8
                        text-center w-52 shadow-md text-white font-bold">
                    <i class="bi bi-printer mx-2"></i>Exporter</a>
            </div>
        </div>
    </div>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }

        td {
            padding: 5px 10px;
            min-height: 40px;
        }
    </style>
    <div
        class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white
                shadow-md sm:rounded-b">
        <table class="w-[80%] text-left table-auto text-slate-800 border border-gray-700" style="margin: auto">
            <thead>
                <tr>
                    <th colspan="4" class="p-3 text-center">PASSATION DES MARCHES
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">1-Mode de passation de Marché : ED : CI : CR/AOR : AON/AOI: Autre :</td>
                </tr>
                <tr>
                    <td>Date de reception : {{ $paiement->rpm->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td class="text-nowrap">OBSERVATION / RECOMMENDATION </td>
                </tr>
                <tr>
                    <td>
                        2-PV d'Adjudicative /NO : (1) <br> <br>
                        3-contrat/convention de : (1) d'adjucation <br> <br>
                        4-Bon de commande : (1) d'adjucation <br> <br>
                        5-Pour les travaux: <br>
                        -Conformité technique : <br>
                        -PV de reception / Tech / Prov / Def (1) : <br>
                        -Pénalité de retard : <br> <br>
                        6-Pour les Biens: <br>
                        -Conformité technique : <br>
                        -PV de reception/BL (1): <br>
                        -Pénalité de retard : <br> <br>
                        7-Pour les service de consultations <br>
                        -conformité du rapport @ facture :<br>
                        <strong>[ (1) A joindre avec la facture ] </strong>
                    </td>
                    <td>
                        <strong>{{ $paiement->rpm->pv_Adjudication === 1 ? 'X' : '' }}</strong> <br><br>
                        <strong>{{ $paiement->rpm->contrat_convention === 1 ? 'X' : '' }}</strong> <br> <br>
                        <strong>{{ $paiement->rpm->bon_de_commande === 1 ? 'X' : '' }}</strong> <br> <br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_technique_travaux === 1 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->rpm->pv_de_reception_travaux === 1 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rpm->penalite_de_retard_travaux === 1 ? 'X' : '' }}</strong> <br> <br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_technique_biens === 1 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->rpm->pv_de_reception_biens === 1 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rpm->penalite_de_retard_biens === 1 ? 'X' : '' }}</strong> <br><br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_rapport_facture === 1 ? 'X' : '' }}</strong> <br> <br>

                    </td>
                    <td>
                        <strong>{{ $paiement->rpm->pv_Adjudication === 2 ? 'X' : '' }}</strong> <br><br>
                        <strong>{{ $paiement->rpm->contrat_convention === 2 ? 'X' : '' }}</strong> <br> <br>
                        <strong>{{ $paiement->rpm->bon_de_commande === 2 ? 'X' : '' }}</strong> <br> <br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_technique_travaux === 2 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->rpm->pv_de_reception_travaux === 2 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rpm->penalite_de_retard_travaux === 2 ? 'X' : '' }}</strong> <br> <br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_technique_biens === 2 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->rpm->pv_de_reception_biens === 2 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rpm->penalite_de_retard_biens === 2 ? 'X' : '' }}</strong> <br><br>
                        <br>
                        <strong>{{ $paiement->rpm->conformite_rapport_facture === 2 ? 'X' : '' }}</strong> <br> <br>

                    </td>
                    <td>{{ $paiement->rpm ? $paiement->rpm->observations : 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="4">8- Montant du paiement actuel :
                        <strong>{{ $paiement->rpm ? $paiement->rpm->montant_paiement_actuel : 'N/A' }} Ar</strong>
                    </td>
                </tr>
                <tr>
                    <td> "conformité du dossier pour le paiement" :</td>
                    <td><strong>{{ $paiement->rpm->conformite_dossier_paiement === 1 ? 'X' : '' }}</strong></td>
                    <td><strong>{{ $paiement->rpm->conformite_dossier_paiement === 2 ? 'X' : '' }}</strong></td>
                    <td>Signature de RPM :</td>
                </tr>
                <tr>
                    <th colspan="4" class="p-3 text-center">RESPONSABLE EN PLANIFICTION SUIVI ET EVALUATION
                    </th>
                <tr>
                    <td>Date de reception : {{ $paiement->rse->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>Benefs / Com : <strong>{{ $paiement->rse->benef_com }} Ar</strong><br>
                        Ref Acitvité PTA : <strong>{{ $paiement->rse->ref_activite_pta }} Ar</strong><br>
                        Conforme aux activités : <br>
                        Montant prévu : <strong>{{ $paiement->rse->montant_prevu }} Ar</strong>
                    </td>
                    <td>
                        <br><br>
                        <strong>{{ $paiement->rse->conformite_aux_activite === 1 ? 'X' : '' }}</strong><br><br>
                    </td>
                    <td>
                        <br><br>
                        <strong>{{ $paiement->rse->conformite_aux_activite === 2 ? 'X' : '' }}</strong><br><br>
                    </td>
                    <td>
                        {{ $paiement->rse ? $paiement->rse->observations : 'N/A' }} <br> <br>
                        Signature RSE :
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="p-3 text-center">COMPTABILITE
                    </th>
                <tr>
                    <td>Date de reception : {{ $paiement->cpt->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>
                        9 - Verification de la facture : <br>
                        -sur la qualité :<br>
                        -sur les prix unitaires :<br>
                        -sur le total globaux :
                    </td>
                    <td><br>
                        <strong>{{ $paiement->cpt->qualite === 1 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->cpt->prix_unitaires === 1 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->cpt->qualite === 1 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        <br>
                        <strong>{{ $paiement->cpt->qualite === 2 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->cpt->prix_unitaires === 2 ? 'X' : '' }}</strong><br>
                        <strong>{{ $paiement->cpt->total_global === 2 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        {{ $paiement->cpt ? $paiement->cpt->observations : 'N/A' }} <br> <br>
                        Signature CPT :
                    </td>
                </tr>
                <th colspan="4" class="p-3 text-center">
                    FINANCE ET COMPTABILITE
                </th>
                <tr>
                    <td>Date de reception : {{ $paiement->raf->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>
                        Avis favorable : <br>
                        Montant à payer : <strong> {{ $paiement->raf->montant_payer }} Ar</strong>
                    </td>
                    <td>
                        <strong>{{ $paiement->raf->avis_favorable === 1 ? 'X' : '' }}</strong> <br> <br>
                    </td>
                    <td>
                        <strong>{{ $paiement->raf->avis_favorable === 2 ? 'X' : '' }}</strong> <br> <br>
                    </td>
                    <td>
                        {{ $paiement->raf ? $paiement->raf->observations : 'N/A' }}<br> <br>
                        Signature RAF :
                    </td>
                </tr>
                {{-- Raf a ne pas oublier --}}
                <th colspan="4" class="p-3 text-center">
                    AUDITEUR CONTROLLEUR INTERNE
                </th>
                <tr>
                    <td>Date de reception : {{ $paiement->rai->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>
                        10 - Contrôle de la facture : <br>
                        -Conformité par rapport aux procédures :<br>
                        -Eligibilité de la facture :<br>
                        -Autre controle et verification :
                    </td>
                    <td><br>
                        <strong>{{ $paiement->rai->conformite_rapport === 1 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rai->egalite_facture === 1 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rai->controle_verification === 1 ? 'X' : '' }}</strong>
                    </td>
                    <td><br>
                        <strong>{{ $paiement->rai->conformite_rapport === 2 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rai->egalite_facture === 2 ? 'X' : '' }}</strong> <br>
                        <strong>{{ $paiement->rai->controle_verification === 2 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        {{ $paiement->rai ? $paiement->rai->observations : 'N/A' }}<br> <br>
                        Signature RAI :
                    </td>
                </tr>
                <th colspan="4" class="p-3 text-center">OBSERVATION / AUTORISATION DE PAIEMENT POUR LE CHARGE DES
                    PROGRAMMES
                </th>
                <tr>
                    <td>Date de reception : {{ $paiement->cp->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>conformité aux procedure :</td>
                    <td>
                        <strong>{{ $paiement->cp->conformite_procedure === 1 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        <strong>{{ $paiement->cp->conformite_procedure === 2 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        {{ $paiement->cp ? $paiement->cp->observations : 'N/A' }} <br>
                        Signature CP :
                    </td>
                </tr>

                <th colspan="4" class="p-3 text-center">OBSERVATION / AUTORISATION DE PAIEMENT PAR LE COORDONNATEUR
                    DE PROJET ADJOINT
                </th>
                <tr>
                    <td>Date de reception : {{ $paiement->ca->created_at }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>Conformité aux procedure</td>
                    <td>
                        <strong>{{ $paiement->ca->conformite_procedure === 1 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        <strong>{{ $paiement->ca->conformite_procedure === 2 ? 'X' : '' }}</strong>
                    </td>
                    <td>
                        {{ $paiement->ca ? $paiement->ca->observations : 'N/A' }} <br>
                        Approbation CA :
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="pb-8">
        </div>
    </div>
</x-card-dashboard>
