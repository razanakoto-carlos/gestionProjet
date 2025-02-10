<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
            <div class="flex justify-between">
                <div>
                    <a href="{{ route('project.create') }}"
                        class="flex justify-center items-center m-3 ml-24 transition ease-in-out bg-blue-500 hover:bg-blue-600 px-4 py-2 border h-8 
                            text-center w-52 shadow-md text-white font-bold">
                        <i class="bi bi-plus-lg mx-2"></i>NOUVEAU PROJET</a>
                </div>
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
            <table class="w-full text-left table-auto min-w-max text-slate-800">
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
                                Statut Requête
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Paiements
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Statut Paiements
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
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Exporter
                            </p>
                        </th>
                        <th class="p-4">
                            <p></p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="p-4">
                                <p class="text-sm font-semibold">
                                    {{ $project->nom_projet }}
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    {{ $project->date }}
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-semibold ">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    @foreach (json_decode($project->fichier) as $file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                          class="text-gray-600 hover:underline hover:text-gray-700">{{ basename($file) }}</a><br>
                                    @endforeach
                                </p>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-card-dashboard>
