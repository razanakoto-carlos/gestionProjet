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
                        <form method="POST" action="{{ route('rai.update', $rai->id) }}" class="mt-6 space-y-6">
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
                                    <label
                                        class="block text-sm mr-[3rem] max-w-28 text-left text-wrap text-gray-700 font-semibold"
                                        for="validation">Requete Conforme Aux Procedures</label>
                                    <select name="conforme_aux_procedures" id="conforme_aux_procedures"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rai->conforme_aux_procedures === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rai->conforme_aux_procedures === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rai->conforme_aux_procedures === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conforme_aux_procedures')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.8rem] text-lg text-gray-500 font-semibold"
                                        for="observations" :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{ old('observations', $rai->observations) }}</textarea>
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
