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
                        <form method="POST" action="{{route('rse.update', $rse->id)}}" class="mt-6 space-y-6">
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
                                    <x-input-label class="mr-[3.3rem] text-lg text-gray-500 font-semibold text-nowrap"
                                        for="code_analytique" :value="__('Code Analytique')" />
                                    <select name="code_analytique" id="code_analytique"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rse->code_analytique === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rse->code_analytique === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rse->code_analytique === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('code_analytique')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[4.1rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="montant_ptba" :value="__('Montant PTBA')" />
                                    <x-text-input id="montant_ptba" min="0" step="any" name="montant_ptba"
                                        type="number" class="block w-full h-8" :value="old('montant_ptba', $rse->montant_ptba)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('montant_ptba')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.2rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_requete" :value="__('Conformité De La Requête')" />
                                    <select name="conformite_requete" id="conformite_requete"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rse->conformite_requete === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rse->conformite_requete === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rse->conformite_requete === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_requete')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[3rem] max-w-28 text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_tdr_ptba" :value="__('Conformité Du TDR Ou PTBA')" />
                                    <select name="conformite_tdr_ptba" id="conformite_tdr_ptba"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rse->conformite_tdr_ptba === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rse->conformite_tdr_ptba === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rse->conformite_tdr_ptba === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_tdr_ptba')" />
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
