<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-4 gap-2">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Hello</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Hello</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Hello</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Hello</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
        <div>
            <div
                class="mt-6 relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white 
                shadow-md sm:rounded-lg">
                <div class="flex justify-between">
                    <div>
                        <button
                            class="flex justify-center items-center m-3 ml-24 transition ease-in-out bg-blue-500 hover:bg-blue-600 px-4 py-2 border h-8 
                            text-center w-52 shadow-md text-white font-bold">
                            <i class="bi bi-plus-lg mx-2"></i>NOUVEAU PROJET</button>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="search" class="h-8" placeholder="Search">
                        <button class="mr-6 py-1 px-3 font-semibold bg-green-500 hover:bg-green-600 transition ease-in-out text-white">
                        SEARCH</button>
                    </div>
                </div>
                <table class="w-full text-left table-auto min-w-max text-slate-800">
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
                                    class="text-xs shadow shadow-black p-2 uppercase font-semibold text-center cursor-pointer">
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
                            <td class="p-4">
                                <button class="text-purple-800 border border-purple-800 my-2 px-3 pb-1 rounded">requête</button>
                                <button class="text-red-800 border border-red-800 my-2 px-3 pb-1 rounded">Paiements</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
