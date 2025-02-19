<x-card-dashboard>
    <div>
        <div class="mt-6 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
            <div class="flex justify-center text-2xl my-3 text-gray-600">
                <h2>GESTION D'UTILISATEUR</h2>
            </div>
        </div>
        <div class="w-full h-full overflow-y-hidden text-gray-700 bg-white 
                shadow-md sm:rounded-b">
            <table class="w-auto text-left table-auto min-w-max text-slate-800">
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
                            <td class="py-2 px-3">
                                @if ($user->image_user)
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ asset('storage/images/' . $user->image_user) }}"
                                        alt="profil d'utilisateur">
                                @else
                                    <img class="w-12 h-12 rounded-full" src="{{ asset('images/default-user.jpg') }}"
                                        alt="utilisateur">
                                @endif
                            </td>
                            <td class="py-2 px-3">
                                <p class="capitalize font-medium">{{ $user->name }}</p>
                                <i class="bi bi-envelope-fill mr-1"></i>{{ $user->email }}
                            </td>
                            <td class="py-2 px-3 text-xs">
                                {{ $user->role->name }}
                            </td>
                            <td class="py-2 px-3">
                                @if (Auth::id() === $user->id || (Auth::user()->role && Auth::user()->role->name === 'DP'))
                                    <a href="{{ route('profile.edit', $user->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 px-4 py-1 hover:shadow-none transition border shadow-md text-white font-bold">MODIFIER</a>
                                @endif
                            </td>
                            <td class="py-2 px-3">
                                @if (Auth::id() === $user->id || (Auth::user()->role && Auth::user()->role->name === 'DP'))
                                    <form id="delete-form" action="{{ route('profile.destroy', $user->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete(this)"
                                            class="bg-red-500 hover:bg-red-600 hover:shadow-none px-4 py-1 border shadow-md text-white font-bold">SUPPRIMER</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function confirmDelete(button) {
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the closest form to the clicked button
                        button.closest('form').submit();
                    }
                });
            }
        </script>
</x-card-dashboard>
