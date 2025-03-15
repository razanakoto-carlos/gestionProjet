<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white
                shadow-md  sm:rounded-t ">
            <div class="flex justify-between">
                <form method="get" action="/search_ca_paiement" class="mt-2 ml-4">
                    <input type="text" name="search" class="h-8" placeholder="Search">
                    <button
                        class="mr-6 py-1 px-3 font-semibold bg-green-500 hover:bg-green-600 transition ease-in-out text-white">
                        RECHERCHER</button>
                </form>
            </div>
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>APPROBATION DE REQUETES</h2>
            </div>
        </div>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll overflow-y-hidden text-gray-700 bg-white
                shadow-md sm:rounded-b">
            <table class="w-full text-left table-auto min-w-full text-slate-800">
                <thead>
                    <tr class="text-black border-b">
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Project
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Date
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Requête
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Validation Paiement
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Statut Paiement
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Fichier
                            </p>
                        </th>
                        @can('isDP')
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Action
                                </p>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paiements as $paiement)
                        <tr class="border-b">
                            <td class="py-2 pl-4 max-w-7">
                                <p class="text-sm font-semibold text-gray-600">
                                    {{ $paiement->project->nom_projet }}
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    {{ $paiement->project->date }}
                                </p>
                            </td>
                            <td class="p-4">
                                @if (
                                    $paiement->project->r_rse == 0 ||
                                    $paiement->project->r_rsenv == 0 ||
                                        $paiement->project->r_bm == 0 ||
                                        $paiement->project->r_raf == 0 ||
                                        $paiement->project->r_rai == 0 ||
                                        $paiement->project->r_cp == 0 ||
                                        $paiement->project->r_dp == 0)
                                    <p
                                        class="text-xs border transition ease-in-out duration-300 shadow   p-2 uppercase font-semibold text-center cursor-pointer">
                                        en cours
                                    </p>
                                @elseif (
                                    $paiement->project->r_rse == 1 &&
                                    $paiement->project->r_rsenv == 1 &&
                                        $paiement->project->r_bm == 1 &&
                                        $paiement->project->r_raf == 1 &&
                                        $paiement->project->r_rai == 1 &&
                                        $paiement->project->r_cp == 1 &&
                                        $paiement->project->r_dp == 1)
                                    <p
                                        class="text-xs text-white bg-green-600 border-green-700 transition ease-in-out duration-300 shadow p-2 uppercase font-semibold text-center cursor-pointer">
                                        Validé
                                    </p>
                                @else
                                    <p
                                        class="text-xs text-white bg-yellow-600 border-yellow-700 transition ease-in-out duration-300 shadow p-2 uppercase font-semibold text-center cursor-pointer">
                                        Non Validé
                                    </p>
                                @endif
                            </td>
                            <td class="p-4">
                                @if ($paiement->ca()->count())
                                    @if (
                                        $paiement->ca->conformite_procedure == 0 )
                                        <p
                                            class="text-xs  border transition ease-in-out duration-300 shadow shadow-gray-700  p-2 uppercase font-semibold text-center cursor-pointer">
                                            en cours
                                        </p>
                                    @elseif ($paiement->ca->conformite_procedure == 1)
                                        <p
                                            class="text-xs text-white bg-green-600 transition ease-in-out duration-300 shadow p-2 uppercase font-semibold text-center cursor-pointer">
                                            Validé
                                        </p>
                                    @else
                                        <p
                                            class="text-xs text-white bg-yellow-600  border-yellow-700 transition ease-in-out duration-300 shadow shadow-yellow-800 p-2 uppercase font-semibold text-center cursor-pointer">
                                            Non Validé
                                        </p>
                                    @endif
                                @else
                                    <p
                                        class="text-xs border transition ease-in-out duration-300 shadow shadow-gray-700  p-2 uppercase font-semibold text-center cursor-pointer">
                                        Non commencé
                                    </p>
                                @endif
                            </td>
                            <td class="p-4">
                                @if ($paiement->ca()->count())
                                    <p class="text-sm">
                                        <x-rating-calculator :ratings="[
                                            $paiement->ca->conformite_procedure,
                                        ]" />
                                    </p>
                                @else
                                    <p class="text-sm">
                                        00.00%
                                    </p>
                                @endif
                            </td>

                            <td>
                                <p href="#" class="text-sm font-normal ">
                                    @foreach (json_decode($paiement->project->fichier) as $file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                            class="text-gray-600 hover:underline hover:text-gray-800">{{ basename($file) }}</a><br>
                                    @endforeach
                                </p>
                            </td>
                            @can('isDP')
                                <td class="p-4">
                                    <a href="{{ route('caPaiement.edit', $paiement->ca->id) }}"
                                        class="hover:shadow-transparent border transition ease-in-out duration-300 shadow shadow-gray-700 px-3 py-1 font-semibold text-center">VALIDATION</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div  class="p-2">
              {{ $paiements->links() }}
            </div>
        </div>
    </div>
</x-card-dashboard>
