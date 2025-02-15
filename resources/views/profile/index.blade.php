<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>GESTION D'UTILISATEUR</h2>
            </div>
        </div>
        <div
            class="relative flex flex-col w-full h-full overflow-y-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-b">
            <table class="w-full text-left table-auto min-w-max text-slate-800">
                <thead>
                    <tr class="text-black border-b">
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Photo
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Nom
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Role
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Modifier le profil
                            </p>
                        </th>
                        <th class="p-4">
                            <p class="text-md leading-none font-semibold">
                                Supprimer l'utilisateur
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="p-4">
                                <p class="text-md">
                                    @if ($user->image_user)
                                        <img class="w-10 h-10 rounded-full" src="" alt="profil d'utilisateur">
                                    @else
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('images/default-user.jpg') }}"
                                            alt="utilisateur">
                                    @endif
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm capitalize">
                                    {{ $user->name }}
                                </p>
                            </td>
                            <td class="p-4">
                                <p class="text-sm">
                                    {{ $user->role->name }}
                                </p>
                            </td>
                            <td class="p-4">
                                <a href="{{route('profile.edit', $user)}}"
                                    class="bg-blue-500 hover:bg-blue-600 px-4 py-1 border shadow-md text-white font-bold">MODIFIER</a>
                            </td>
                            <td class="p-4">
                                <button
                                    class="bg-red-500 hover:bg-red-600 px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-card-dashboard>
