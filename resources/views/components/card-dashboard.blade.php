<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-4 md:grid-cols-2 gap-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-md h-28">
                <div class="p-3">
                    <h3 class="mb-1 text-lg text-gray-700">Projets</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p class="ml-2 mt-2">{{$projectCount}}</p>
                        <i class="bi bi-building text-5xl text-[#ee5e20]"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-3">
                    <h3 class="mb-1 text-lg text-gray-700">Utilisateurs</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p class="ml-2 mt-2">{{$userCount}}</p>
                        <i class="bi bi-person text-5xl text-[#5186e1]"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-3">
                    <h3 class="mb-1 text-lg text-gray-700">Requêtes validé</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p class="ml-2 mt-2">{{$requetteValide}}</p>
                        <i class="bi bi-list-check text-5xl text-[#438f3d]"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-3">
                    <h3 class="mb-1 text-lg text-gray-700">Paiements validé</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p class="ml-2 mt-2">{{$paiementValide}}</p>
                        <i class="bi bi-cash-coin text-5xl text-orange-400"></i>
                    </div>
                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</x-layout>
