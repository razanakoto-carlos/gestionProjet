<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t ">
            <div class="flex justify-between">
                <div class="mt-2">
                    <input type="text" name="search" class="h-8" placeholder="Search">
                    <button
                        class="mr-6 py-1 px-3 font-semibold bg-green-500 hover:bg-green-600 transition ease-in-out text-white">
                        RECHERCHER</button>
                </div>
            </div>
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>CIRCUIT D'APPROBATION DE REQUETES</h2>
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
                                Statut general
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Validation RSE
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Statut
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Date
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Fichier
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Action
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-b">
                            <td class="py-2 pl-4 max-w-7">
                                <p class="text-sm font-semibold text-gray-600">
                                    {{ $project->nom_projet }}
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-300 shadow shadow-gray-700  p-2 uppercase font-semibold text-center cursor-pointer">
                                    Validé
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-300 shadow shadow-gray-700  p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    {{ $project->date }}
                                </p>
                            </td>
                            <td>
                                <p href="#" class="text-sm font-normal ">
                                    @foreach (json_decode($project->fichier) as $file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                          class="text-gray-600 hover:underline hover:text-gray-700">{{ basename($file) }}</a><br>
                                    @endforeach
                                </p>
                            </td>
                            <td class="p-4">
                                <a href="{{route('rse.edit', $project->rse->id)}}"
                                    class="hover:shadow-transparent hover:border transition ease-in-out duration-300 shadow shadow-gray-700 px-3 py-1 font-semibold text-center">VALIDATION</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-card-dashboard>
