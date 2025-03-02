<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg uppercase font-semibold text-gray-700">
                                {{ __('validation rpm') }}
                            </h2>
                        </header>
                        <form method="POST" action="{{ route('rpm.update', $rpm->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-32 text-lg text-gray-500 font-semibold" for="date"
                                        :value="__('Date')" />
                                    <x-text-input id="date" name="date" type="date" class="block w-full h-8"
                                        :value="old('date', $rpm->date)" required />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[1.25rem] text-nowrap text-lg text-gray-500 font-semibold" for="allocation_budgetaire"
                                        :value="__('Allocation budgétaire')" />
                                    <select name="allocation_budgetaire" id="allocation_budgetaire"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->allocation_budgetaire === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->allocation_budgetaire === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rpm->allocation_budgetaire === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('allocation_budgetaire')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="max-w-32 text-left mr-[2rem]  text-lg text-gray-500 font-semibold" for="prix_unitaire_etc"
                                        :value="__('Prix unitaire, Taux d\'indeminités, Taux de Cons Card/Lub')" />
                                    <select name="prix_unitaire_etc" id="prix_unitaire_etc"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->prix_unitaire_etc === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->prix_unitaire_etc === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rpm->prix_unitaire_etc === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('prix_unitaire_etc')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[7.5rem] text-lg text-gray-500 font-semibold" for="autres"
                                        :value="__('Autres')" />
                                    <select name="autres" id="autres"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->autres === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->autres === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rpm->autres === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('autres')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[4.8rem] text-lg text-gray-500 font-semibold"
                                        for="observations" :value="__('Observations')" />
                                    <textarea class="border border-gray-300 border-solid w-full" name="observations" id="observations" rows="5">{{ old('observations', $rpm->observations) }}</textarea>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('observations')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Validation</button>
                                @if (session('status') === 'rpm-updated')
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
