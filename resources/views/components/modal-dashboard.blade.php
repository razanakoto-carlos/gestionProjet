<div x-data="{ open: false }">
    <!-- Open Modal Button -->
    <button @click="open = true"
        class="text-xs hover:shadow-transparent border transition ease-in-out duration-300 shadow shadow-gray-700 p-2 uppercase font-semibold text-center cursor-pointer">{{$buttonText ?? 'Open Modal' }}</button>

    <!-- Modal -->
    <div x-show="open"
        class="fixed inset-0 flex justify-center bg-black bg-opacity-50 items-center"
        x-transition.opacity>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2"
            @click.outside="open = false" x-transition>
            <div class="flex justify-end">
                <button @click="open = false"
                    class="text-red-500 text-2xl font-semibold">X</button>
            </div>
            <h2 class="text-xl font-semibold text-center p-4">Approbation des
                requetes pour {{ $projectName }}</h2>
            <hr>
            <table class="w-full text-left table-auto min-w-max text-slate-800">
                <thead>
                    <tr class="text-black border-b">
                        <th class="p-2">
                            <p class="text-md font-semibold">
                                Responsable
                            </p>
                        </th>
                        <th class="p-2">
                            <p class="text-md font-semibold">
                                Validation
                            </p>
                        </th>
                        <th class="p-2">
                            <p class="text-md font-semibold">
                                Observation
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($responsables as $key => $responsable)
                    <tr class="border-b">
                        <td class="p-2">
                            <p class="text-sm font-semibold">
                               {{ $key}}
                            </p>
                        </td>
                        <td class="p-2">
                            <p class="text-sm font-semibold">
                                @if ($responsable === 0)
                                    En attente de reponse
                                @elseif ($responsable === 1)
                                    OUI
                                @else
                                    N/A
                                @endif
                            </p>
                        </td>
                        <td class="p-2">
                            <p class="text-sm font-semibold">
                                @if ($responsable === 0)
                                N/A
                                @elseif ($responsable === 1)
                               {{ optional($project->{Str::lower($key)}()->first())->observations ?? 'N/A'}}
                                @else
                                N/A
                                @endif
                            </p>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>