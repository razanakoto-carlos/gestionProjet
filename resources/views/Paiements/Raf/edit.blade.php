<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg uppercase font-semibold text-gray-700">
                                {{ __('validation raf') }}
                            </h2>
                        </header>
                        <form method="POST" action="{{route('rafPaiement.update', $raf->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-32 text-lg text-gray-500 font-semibold" for="date"
                                        :value="__('Date')" />
                                    <x-text-input id="date" name="date" type="date" class="block w-full h-8"
                                        :value="old('date', $raf->date)" required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[4.2rem] text-left text-nowrap text-lg text-gray-500 font-semibold"
                                        for="avis_favorable" :value="__('Avis Favorable')" />
                                    <select name="avis_favorable" id="avis_favorable"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $raf->avis_favorable === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $raf->avis_favorable === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $raf->avis_favorable === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('avis_favorable')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[4.1rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="montant_payer" :value="__('Montant Payer')" />
                                    <x-text-input id="montant_payer" min="0" name="montant_payer"
                                        type="number" class="block w-full h-8" :value="old('montant_payer', $raf->montant_payer)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('montant_payer')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.8rem] text-lg text-gray-500 font-semibold" for="observations"
                                        :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{old('observations', $raf->observations)}}</textarea>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('observations')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Validation</button>
                                @if (session('status') === 'raf-updated')
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
