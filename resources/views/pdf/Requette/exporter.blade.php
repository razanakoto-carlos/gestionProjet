<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div
        class="relative flex flex-col w-full h-full overflow-hidden overflow-y-hidden text-gray-700 bg-white 
            shadow-md sm:rounded-b">
        <table class="w-full text-left table-auto min-w-max text-slate-800  border border-gray-700">
            <thead>
                <tr>
                    <th colspan="4">OBSERVATION / VERIFICATION EFFECTUEE PAR
                        <br>LE RESPONSABLE EN PLANIFICTION ET SUIVI EVALUATION
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Date de reception :{{ $project->date }}</td>
                    <td>OUI</td>
                    <td>NON</td>
                    <td>OBSERVATION</td>
                </tr>
                <tr>
                    <td>Controle des: <br>
                        -code Analytique (composante + active) : <br>
                        - Montant PTBA : <strong>{{ $project->rse->montant_ptba }} Ar </strong> <br>
                        - Conformite de la requete: <br>
                        - conformite du TDR ou PTBA:
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
