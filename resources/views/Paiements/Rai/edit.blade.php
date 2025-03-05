<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg uppercase font-semibold text-gray-700">
                                {{ __('validation rai') }}
                            </h2>
                        </header>
                        <form method="POST" action="{{route('raiPaiement.update', $rai->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-32 text-lg text-gray-500 font-semibold" for="date"
                                        :value="__('Date')" />
                                    <x-text-input id="date" name="date" type="date" class="block w-full h-8"
                                        :value="old('date', $rai->date)" required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[2.9rem] max-w-28 text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_rapport" :value="__('Conformité Par Rapport Aux Procédures')" />
                                    <select name="conformite_rapport" id="conformite_rapport"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rai->conformite_rapport === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rai->conformite_rapport === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rai->conformite_rapport === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_rapport')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[2.4rem]  text-left  text-lg text-gray-500 font-semibold"
                                        for="egalite_facture" :value="__('Eligibilité De La Facture')" />
                                    <select name="egalite_facture" id="egalite_facture"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rai->egalite_facture === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rai->egalite_facture === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rai->egalite_facture === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('egalite_facture')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[0.4rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="controle_verification" :value="__('Autre Contrôle Et Verification')" />
                                    <select name="controle_verification" id="controle_verification"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rai->controle_verification === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rai->controle_verification === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rai->controle_verification === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('controle_verification')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.8rem] text-lg text-gray-500 font-semibold" for="observations"
                                        :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{old('observations', $rai->observations)}}</textarea>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('observations')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Validation</button>
                                @if (session('status') === 'rai-updated')
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
