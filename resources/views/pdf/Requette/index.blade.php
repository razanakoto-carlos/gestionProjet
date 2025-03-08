<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-t">
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>CIRCUIT D'APPROBATION DE REQUETES</h2>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('pdfRequette.exporter', $project->id) }}"
                    class="flex items-center justify-center m-3 ml-24 transition ease-in-out bg-blue-500 hover:bg-blue-600 px-4 py-2 border h-8 
                        text-center w-52 shadow-md text-white font-bold">
                    <i class="bi bi-plus-lg mx-2"></i>Exporter</a>
            </div>
        </div>
    </div>
    <div
        class="relative flex flex-col w-full h-full overflow-hidden overflow-y-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-b">
        <table class="w-full text-left table-auto min-w-max text-slate-800  border border-gray-700">
            <thead>
                <tr>
                    <th colspan="4" class="flex justify-center text-center">OBSERVATION / VERIFICATION EFFECTUEE PAR
                        <br>LE RESPONSABLE EN PLANIFICTION ET SUIVI EVALUATION</th>
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
</x-card-dashboard>
