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
                        <th class="py-2 pl-6 pr-4">
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
                            <td class="py-2 pl-6 pr-4">
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
                                    class="text-xs hover:shadow-transparent border transition ease-in-out duration-300 shadow shadow-gray-700 p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent border transition ease-in-out duration-300 shadow shadow-gray-700  p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    @foreach (json_decode($project->fichier) as $file)
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                          class="text-gray-600 hover:underline hover:text-gray-800">{{ basename($file) }}</a><br>
                                    @endforeach
                                </p>
                            </td>
                            <td class="p-4">
                                <form id="delete-form" action="{{ route('project.destroy', $project->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)"
                                        class="bg-red-500 hover:bg-red-600 hover:shadow-none px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                                </form>
                               </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border  border-purple-800 hover:text-white hover:bg-purple-800 transition ease-in-out my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 hover:text-white transition ease-in-out hover:bg-red-800  px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>
</x-card-dashboard>