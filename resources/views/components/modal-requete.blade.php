<div x-data="{ open: false }">
    <!-- Open Modal Button -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'w-full']) }}>{{ $buttonText ?? 'Open Modal' }}</button>
    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex justify-center bg-black bg-opacity-50 items-center"
        x-transition.opacity>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2" @click.outside="open = false" x-transition>
            <div class="flex  justify-end">
                <button @click="open = false" class="text-red-500 text-2xl font-semibold">X</button>
            </div>
            @php
                $responsables = [
                    'RSE' => $project->r_rse,
                    'RSENV' => $project->r_rsenv,
                    'RPM' => $project->r_bm,
                    'RAF' => $project->r_raf,
                    'RAI' => $project->r_rai,
                    'CP' => $project->r_cp,
                    'DP' => $project->r_dp,
                ];
            @endphp
            <h2 class="text-xl font-semibold text-center p-4">Approbation des
                requetes pour {{ $project->nom_projet }}</h2>
            <hr>
            <div class="w-full text-left text-slate-800">
                <ul class="min-w-max">
                    <li class="text-black border-b flex">
                        <span class="p-2 text-md font-semibold w-1/3">Responsable</span>
                        <span class="p-2 text-md font-semibold w-1/3">Validation</span>
                        <span class="p-2 text-md font-semibold w-1/3">Observation</span>
                    </li>
                    @foreach ($responsables as $key => $responsable)
                        <li class="border-b flex {{ $responsable === 1 ? 'bg-green-500' : '' }}">
                            <span class="p-2 text-sm font-semibold w-1/3">{{ $key }}</span>
                            <span class="p-2 text-sm font-semibold w-1/3">
                                @if ($responsable === 0)
                                    En attente de reponse
                                @elseif ($responsable === 1)
                                    OUI
                                @else
                                    N/A
                                @endif
                            </span>
                            <span class="p-2 text-sm font-semibold w-1/3">
                                @if ($responsable === 0)
                                    N/A
                                @elseif ($responsable === 1)
                                    @php
                                        $name = Str::lower($key);
                                    @endphp
                                    {{ $project->$name->observations }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
