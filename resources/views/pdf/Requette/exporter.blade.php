<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>circuit_approbation_requetes</title>
</head>

<body>
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
            min-height: 50px;
        }
    </style>
    <div>
        <h4 style="margin:10px 150px">CIRCUIT D'APPROBATION DE REQUETES</h4>
        <div>
            <h4>
                NOM DU PROJET: {{ $project->nom_projet }}
            </h4>
        </div>
    </div>
    <table style="margin:auto;">
        <thead>
            <tr>
                <th colspan="4" class="p-3 text-center">OBSERVATION / VERIFICATION EFFECTUEE PAR
                    <br>LE RESPONSABLE EN PLANIFICTION ET SUIVI EVALUATION
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Date de reception : {{ $project->rpm->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Controles des : <br>
                    - Code Analytique (composant + active) :
                    - Montant PTBA: <strong>{{ $project->rse->montant_ptba }}</strong><br>
                    - Conformite de la requette:<br>
                    - Conformite du TDR ou PTBA :
                </td>
                <td>
                    <br>
                    <strong>{{ $project->rse->code_analytique === 1 ? 'X' : '' }}</strong><br>
                    <strong>{{ $project->rse->conformite_requete === 1 ? 'X' : '' }}</strong> <br>
                    <strong>{{ $project->rse->conformite_tdr_ptba === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <br>
                    <strong>{{ $project->rse->code_analytique === 2 ? 'X' : '' }}</strong><br>
                    <strong>{{ $project->rse->conformite_requete === 2 ? 'X' : '' }}</strong> <br>
                    <strong>{{ $project->rse->conformite_tdr_ptba === 2 ? 'X' : '' }}</strong>
                </td>
                <td>{{ $project->rse ? $project->rse->observations : 'N/A' }}</td>
            </tr>
            <tr>
                <th colspan="4" class="p-3 text-center">OBSERVATION / VERIFICATION EFFECTUEE PAR
                    <br>LE RESPONSABLE EN SAUVEGARDE ENVIRONNEMENTALE ET SOCIALE
                </th>
            <tr>
                <td>Date de reception : {{ $project->rsenv->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Validation</td>
                <td>
                    <strong>{{ $project->rsenv->validation === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <strong>{{ $project->rsenv->validation === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->rsenv ? $project->rsenv->observations : 'N/A' }}
                </td>
            </tr>
            <tr>
                <th colspan="4" class="p-3 text-center">OBSERVATION / VERIFICATION EFFECTUEE PAR
                    <br>LE BUREAU DES MARCHES
                </th>
            <tr>
            <tr>
                <td>Date de reception : {{ $project->rpm->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Controles des : <br>
                    - Allocation Budgetaire : <br>
                    - Prix Unitaire , taux d'indemnités, taux de cons card/clud :<br>
                    - Autres :
                </td>
                <td>
                    <strong>{{ $project->rpm->allocation_budgetaire === 1 ? 'X' : '' }}</strong><br>
                    <strong>{{ $project->rpm->prix_unitaire_etc === 1 ? 'X' : '' }}</strong> <br>
                    <strong>{{ $project->rpm->autres === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <br>
                    <strong>{{ $project->rpm->allocation_budgetaire === 2 ? 'X' : '' }}</strong> <br>
                    <strong>{{ $project->rpm->prix_unitaire_etc === 2 ? 'X' : '' }}</strong> <br>
                    <strong>{{ $project->rpm->autres === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->rpm ? $project->rpm->observations : 'N/A' }}
                </td>
            </tr>

            <th colspan="4" class="p-3 text-center">OBSERVATION / VERIFICATION EFFECTUEE ET AJUSTEMENT EFFECTUEE
                PAR
                <br>LE RESPONSABLE ADMINISTRATIF ET FINANCIER / COMPTABLE
            </th>
            <tr>
                <td>Date de reception : {{ $project->raf->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Validation</td>
                <td>
                    <strong>{{ $project->raf->validation === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <strong>{{ $project->raf->validation === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->raf ? $project->raf->observations : 'N/A' }}
                </td>
            </tr>
            <th colspan="4" class="p-3 text-center">OBSERVATION / CONTROLE DE COMFORMITE EFFECTUES PAR
                <br>LE RESPONSABLE DE L'AUDIT INTERNE
            </th>
            <tr>
                <td>Date de reception : {{ $project->rai->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Conforme aux procedures</td>
                <td>
                    <strong>{{ $project->rai->conforme_aux_procedures === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <strong>{{ $project->rai->conforme_aux_procedures === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->rai ? $project->rai->observations : 'N/A' }}
                </td>
            </tr>
            <th colspan="4" class="p-3 text-center">OBSERVATION / DERNIER VERIFICATION PAR
                <br>LE CHARGE DES PROGRAMMES
            </th>
            <tr>
                <td>Date de reception : {{ $project->cp->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Avis Favorable</td>
                <td>
                    <strong>{{ $project->cp->avis_favorable === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <strong>{{ $project->cp->avis_favorable === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->cp ? $project->cp->observations : 'N/A' }}
                </td>
            </tr>
            <th colspan="4" class="p-3 text-center">OBSERVATION / AUTORISATION DE REQUETE PAR
                <br>LE COORDONNATEUR DE PROJET ADJOINT
            </th>
            <tr>
                <td>Date de reception : {{ $project->dp->created_at }}</td>
                <td>OUI</td>
                <td>NON</td>
                <td>OBSERVATION</td>
            </tr>
            <tr>
                <td>Approbation</td>
                <td>
                    <strong>{{ $project->dp->approbation === 1 ? 'X' : '' }}</strong>
                </td>
                <td>
                    <strong>{{ $project->dp->approbation === 2 ? 'X' : '' }}</strong>
                </td>
                <td>
                    {{ $project->dp ? $project->dp->observations : 'N/A' }}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
