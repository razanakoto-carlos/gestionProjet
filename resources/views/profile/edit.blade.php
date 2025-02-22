<x-card-dashboard>
    <div class="mt-5 w-full h-full overflow-hidden text-gray-700 bg-white 
                shadow-md  sm:rounded-t">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="py-4 sm:p-8">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="-ml-6 -pt-4 text-lg font-semibold text-gray-700">
                                {{ __('Modification d\'utilisateur') }}
                            </h2>
                        </header>
                        <form method="post" action="{{ route('profile.update', $user->id) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-12 text-lg text-gray-500 font-semibold" for="name"
                                        :value="__('Nom')" />
                                    <x-text-input id="name" name="name" type="text" class="block w-full h-8"
                                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-12 text-lg text-gray-500 font-semibold" for="email"
                                        :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="h-8 block w-full"
                                        :value="old('email', $user->email)" required autocomplete="username" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            {{-- Role d'utilisateur --}}
                            @can('isDP')
                                <div>
                                    <div class="flex flex-row text-center items-center">
                                        <x-input-label class="mr-14 text-lg text-gray-500 font-semibold" for="role_id"
                                            :value="__('Role')" />
                                        <select name="role_id" id="role_id"
                                            class="block w-full h-8 px-3 py-2 border border-gray-300 rounded-sm shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">>
                                            <option value="">Selectionner un role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('role_id')" />
                                </div>
                            @endcan
                            {{-- Mot de passe --}}
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-6 text-lg text-gray-500 font-semibold" for="password"
                                        :value="__('Password')" />
                                    <x-text-input id="password" name="password" type="password"
                                        class="mt-1 h-8 block w-full" autocomplete="password"
                                        placeholder="Entrez un nouveau mot de passe (laissez vide pour conserver l'actuel)" />
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                            {{-- Image d'utilisateur --}}
                            <div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-12 text-lg text-gray-500 font-semibold" for="apercu"
                                        :value="__('Aperçu')" />
                                    <img class="w-12 h-12 mb-3 rounded-full object-cover" id="imagePreview"
                                        src="{{ $user->image_user ? asset('storage/images/' . $user->image_user) : asset('images/default-user.jpg') }}" alt="">
                                </div>
                                <div class="flex flex-row text-center items-center">
                                    <x-input-label class="mr-12 text-lg text-gray-500 font-semibold" for="image_user"
                                        :value="__('Image')" />
                                    <x-text-input id="image_user" name="image_user" type="file"
                                        class="block w-full" accept="image/*" onchange="previewImage(event)" />
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('image_user')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="mt-2 inline-flex items-center px-4 py-1 bg-blue-600 border font-semibold text-white uppercase 
                                hover:bg-blue-700 focus:bg-blue-700transition ease-in-out duration-150">Modifier</button>
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Modifier.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-card-dashboard>
