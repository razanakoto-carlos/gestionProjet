<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg uppercase font-semibold text-gray-700">
                                {{ __('validation rse') }}
                            </h2>
                        </header>
                        <form method="POST" action="{{route('rsePaiement.update', $rse->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-32 text-lg text-gray-500 font-semibold" for="date"
                                        :value="__('Date')" />
                                    <x-text-input id="date" name="date" type="date" class="block w-full h-8"
                                        :value="old('date', $rse->date)" required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[5rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="benef_com" :value="__('Benefs/Com')" />
                                    <x-text-input id="benef_com" min="0" name="benef_com"
                                        type="number" class="block w-full h-8" :value="old('benef_com', $rse->benef_com)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('benef_com')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[3.6rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="ref_activite_pta" :value="__('Réf Activite PTA')" />
                                    <x-text-input id="ref_activite_pta" min="0" name="ref_activite_pta"
                                        type="number" class="block w-full h-8" :value="old('ref_activite_pta', $rse->ref_activite_pta)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('ref_activite_pta')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.7rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_aux_activite" :value="__('Conformité Aux Activités')" />
                                    <select name="conformite_aux_activite" id="conformite_aux_activite"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rse->conformite_aux_activite === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rse->conformite_aux_activite === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rse->conformite_aux_activite === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_aux_activite')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[4.1rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="montant_prevu" :value="__('Montant Prévu')" />
                                    <x-text-input id="montant_prevu" min="0" name="montant_prevu"
                                        type="number" class="block w-full h-8" :value="old('montant_prevu', $rse->montant_prevu)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('montant_prevu')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.8rem] text-lg text-gray-500 font-semibold" for="observations"
                                        :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{old('observations', $rse->observations)}}</textarea>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('observations')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Validation</button>
                                @if (session('status') === 'rse-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Validation.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-card-dashboard>
