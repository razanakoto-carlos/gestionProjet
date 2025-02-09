<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-4 md:grid-cols-2 gap-2">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="mb-2 text-lg text-gray-700">Projets</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p>5</p>
                        <i class="bi bi-calendar2-plus"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="mb-4 text-lg text-gray-700">Utilisateurs</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p>6</p>
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 ">
                    <h3 class="mb-4 text-lg text-gray-700">Requêtes validé</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p>3</p>
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 ">
                    <h3 class="mb-4 text-lg text-gray-700">Paiements validé</h3>
                    <div class="flex justify-between font-bold text-3xl text-gray-500">
                        <p>2</p>
                        <i class="bi bi-cart-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div
                class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
                <div class="flex justify-between">
                    <div>
                        <button
                            class="flex justify-center items-center m-3 ml-24 transition ease-in-out bg-blue-500 hover:bg-blue-600 px-4 py-2 border h-8 
                            text-center w-52 shadow-md text-white font-bold">
                            <i class="bi bi-plus-lg mx-2"></i>NOUVEAU PROJET</button>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="search" class="h-8" placeholder="Search">
                        <button
                            class="mr-6 py-1 px-3 font-semibold bg-green-500 hover:bg-green-600 transition ease-in-out text-white">
                            SEARCH</button>
                    </div>
                </div>
                <div class="flex justify-center text-2xl my-3 text-gray-600">
                    <h2>CIRCUIT D'APPROBATION DE REQUETES</h2>
                </div>
            </div>
            <div
                class="relative flex flex-col w-full h-full overflow-scroll overflow-y-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-b">
                <table class="w-full text-left table-auto  min-w-max text-slate-800">
                    <thead>
                        <tr class="text-black border-b">
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Project
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Date
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Requête
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Statut Requête
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Paiements
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Statut Paiements
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Fichier
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Action
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-md leading-none font-semibold">
                                    Exporter
                                </p>
                            </th>
                            <th class="p-4">
                                <p></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-4">
                                <p class="text-md">
                                    Beta Campaign
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15/02/2024
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-semibold ">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    1738667280_afro-samurai-wj.jpg <br>
                                    1738667280_ak-12-girl-4k-ik.jpg <br>
                                    1738667280_all-those-evenings-5k-6x.jpg
                                </p>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4">
                                <p class="text-md">
                                    Beta Campaign
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15/02/2024
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-semibold ">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    1738667280_afro-samurai-wj.jpg <br>
                                    1738667280_ak-12-girl-4k-ik.jpg <br>
                                    1738667280_all-those-evenings-5k-6x.jpg
                                </p>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4">
                                <p class="text-md">
                                    Beta Campaign
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15/02/2024
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-semibold ">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    1738667280_afro-samurai-wj.jpg <br>
                                    1738667280_ak-12-girl-4k-ik.jpg <br>
                                    1738667280_all-those-evenings-5k-6x.jpg
                                </p>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4">
                                <p class="text-md">
                                    Beta Campaign
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15/02/2024
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    15.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs hover:shadow-transparent hover:border transition ease-in-out duration-500 shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-semibold ">
                                    00.00%
                                </p>
                            </td>
                            <td class="p-4">
                                <p
                                    class="text-xs shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
                                    en cours
                                </p>
                            </td>
                            <td class="p-4">
                                <p href="#" class="text-sm font-normal ">
                                    1738667280_afro-samurai-wj.jpg <br>
                                    1738667280_ak-12-girl-4k-ik.jpg <br>
                                    1738667280_all-those-evenings-5k-6x.jpg
                                </p>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                            <td class="grid grid-cols-1">
                                <button
                                    class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button
                                    class="text-red-800 border border-red-800 mb-1 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
