<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg uppercase font-semibold text-gray-700">
                                {{ __('validation cpt') }}
                            </h2>
                        </header>
                        <form method="POST" action="{{route('cptPaiement.update', $cpt->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[7.8rem] text-lg text-gray-500 font-semibold" for="date"
                                        :value="__('Date')" />
                                    <x-text-input id="date" name="date" type="date" class="block w-full h-8"
                                        :value="old('date', $cpt->date)" required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.7rem] max-w-32 text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="qualite" :value="__('Verification De La Facture Sur La Qualité')" />
                                    <select name="qualite" id="qualite"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $cpt->qualite === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $cpt->qualite === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $cpt->qualite === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('qualite')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.7rem] max-w-32 text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="prix_unitaires" :value="__('Verification De La Facture Sur Les Prix Unitaires')" />
                                    <select name="prix_unitaires" id="prix_unitaires"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $cpt->prix_unitaires === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $cpt->prix_unitaires === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $cpt->prix_unitaires === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('prix_unitaires')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.7rem] max-w-32 text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="total_global" :value="__('Verification De La Facture Sur Le Total Gloabal')" />
                                    <select name="total_global" id="total_global"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $cpt->total_global === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $cpt->total_global === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $cpt->total_global === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('total_global')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.6rem] text-lg text-gray-500 font-semibold" for="observations"
                                        :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{old('observations', $cpt->observations)}}</textarea>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('observations')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Validation</button>
                                @if (session('status') === 'cpt-updated')
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
