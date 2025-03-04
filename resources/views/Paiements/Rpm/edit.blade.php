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
                        <form method="POST" action="{{ route('rpmPaiement.update', $rpm->id) }}" class="mt-6 space-y-6">
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
                                    <x-input-label
                                        class="mr-[4.7rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="pv_Adjudication" :value="__('Pv Adjudication')" />
                                    <select name="pv_Adjudication" id="pv_Adjudication"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->pv_Adjudication === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->pv_Adjudication === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rpm->pv_Adjudication === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('pv_Adjudication')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[3.6rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="contrat_convention" :value="__('Contrat convention')" />
                                    <select name="contrat_convention" id="contrat_convention"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->contrat_convention === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->contrat_convention === 1 ? 'selected' : '' }}>
                                            OUI
                                        </option>
                                        <option value="2" {{ $rpm->contrat_convention === 2 ? 'selected' : '' }}>
                                            NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('contrat_convention')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[3.7rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="bon_de_commande" :value="__('Bon de Commande')" />
                                    <select name="bon_de_commande" id="bon_de_commande"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0" {{ $rpm->bon_de_commande === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1" {{ $rpm->bon_de_commande === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2" {{ $rpm->bon_de_commande === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('bon_de_commande')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[0.2rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_technique_travaux" :value="__('Conformite Technique Travaux')" />
                                    <select name="conformite_technique_travaux" id="conformite_technique_travaux"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->conformite_technique_travaux === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->conformite_technique_travaux === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->conformite_technique_travaux === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_technique_travaux')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[2.2rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="pv_de_reception_travaux" :value="__('Pv de Reception Travaux')" />
                                    <select name="pv_de_reception_travaux" id="pv_de_reception_travaux"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->pv_de_reception_travaux === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->pv_de_reception_travaux === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->pv_de_reception_travaux === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('pv_de_reception_travaux')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[1.7rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="penalite_de_retard_travaux" :value="__('Penalite de Retard Travaux')" />
                                    <select name="penalite_de_retard_travaux" id="penalite_de_retard_travaux"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->penalite_de_retard_travaux === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->penalite_de_retard_travaux === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->penalite_de_retard_travaux === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('penalite_de_retard_travaux')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[0.5rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_technique_biens" :value="__('Conformite technique de biens')" />
                                    <select name="conformite_technique_biens" id="conformite_technique_biens"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->conformite_technique_biens === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->conformite_technique_biens === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->conformite_technique_biens === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_technique_biens')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[3.6rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="pv_de_reception_biens" :value="__('Pv de reception biens')" />
                                    <select name="pv_de_reception_biens" id="pv_de_reception_biens"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->pv_de_reception_biens === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->pv_de_reception_biens === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->pv_de_reception_biens === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('pv_de_reception_biens')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[1.7rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_rapport_facture" :value="__('Conformite Rapport facture')" />
                                    <select name="conformite_rapport_facture" id="conformite_rapport_facture"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->conformite_rapport_facture === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->conformite_rapport_facture === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->conformite_rapport_facture === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_rapport_facture')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[2.9rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="penalite_de_retard_biens" :value="__('Penalite de Retard biens')" />
                                    <select name="penalite_de_retard_biens" id="penalite_de_retard_biens"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->penalite_de_retard_biens === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->penalite_de_retard_biens === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->penalite_de_retard_biens === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('penalite_de_retard_biens')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-[0.7rem] text-nowrap text-lg text-gray-500 font-semibold"
                                        for="montant_paiement_actuel" :value="__('Montant paiement actuel')" />
                                    <x-text-input id="montant_paiement_actuel" min="0"
                                        name="montant_paiement_actuel" type="number" class="block w-full h-8"
                                        :value="old('montant_paiement_actuel', $rpm->montant_paiement_actuel)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('montant_paiement_actuel')" />
                            </div>
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label
                                        class="mr-[1.3rem] text-left text-wrap text-lg text-gray-500 font-semibold"
                                        for="conformite_dossier_paiement" :value="__('Conformite dossier paiement')" />
                                    <select name="conformite_dossier_paiement" id="conformite_dossier_paiement"
                                        class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                        <option value="0"
                                            {{ $rpm->conformite_dossier_paiement === 0 ? 'selected' : '' }}>
                                        </option>
                                        <option value="1"
                                            {{ $rpm->conformite_dossier_paiement === 1 ? 'selected' : '' }}>OUI
                                        </option>
                                        <option value="2"
                                            {{ $rpm->conformite_dossier_paiement === 2 ? 'selected' : '' }}>NON
                                        </option>
                                    </select>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('conformite_dossier_paiement')" />
                            </div>
                            <div>
                                <div class="flex flex-row">
                                    <x-input-label class="mr-[5.5rem] text-lg text-gray-500 font-semibold"
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
