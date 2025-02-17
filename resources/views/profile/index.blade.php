<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>GESTION D'UTILISATEUR</h2>
            </div>
        </div>
        <div
            class="w-full h-full overflow-y-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-b">
            <table class="w-full text-left table-auto min-w-max text-slate-800">
                <thead>
                    <tr class="text-black border-b">
                        <th class="p-3 text-md font-semibold">
                            Photo
                        </th>
                        <th class="p-3 text-md font-semibold">
                            Nom
                        </th>
                        <th class="p-3 text-md font-semibold">
                            Role
                        </th>
                        <th class="p-3 text-md font-semibold">
                            Modifier le profil
                        </th>
                        <th class="p-3 text-md font-semibold">
                            Supprimer l'utilisateur
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="p-2">
                                @if ($user->image_user)
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/images/'.$user->image_user)}}" alt="profil d'utilisateur">
                                @else
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/default-user.jpg') }}"
                                        alt="utilisateur">
                                @endif
                            </td>
                            <td class="p-2 text-sm capitalize">
                                {{ $user->name }}
                            </td>
                            <td class="p-2 text-sm">
                                {{ $user->role->name }}
                            </td>
                            <td class="p-2">
                                <a href="{{ route('profile.edit', $user) }}"
                                    class="bg-blue-500 hover:bg-blue-600 px-4 py-1 border shadow-md text-white font-bold">MODIFIER</a>
                            </td>
                            <td class="p-2">
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
