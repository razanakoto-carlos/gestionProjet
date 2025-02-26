<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Circuit d'approbation de requêtes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Top Navbar (Always on top) -->
    <header class="bg-[#39444e] text-white px-4 py-1 flex justify-between items-center fixed top-0 left-0 w-full z-50">

        <!-- Left: Sidebar Toggle & Logo -->
        <div class="flex items-center space-x-4 ml-12">
            <a href="{{ route('dashboard') }}" class="text-xl">
                <i class="bi bi-speedometer mx-2"></i>Dashboard
            </a>
        </div>

        <!-- Right: User Profile & Logout (Navbar) -->
        <div class="flex items-center space-x-4">
            <x-dropdown>
                <x-slot name="trigger">
                    <div class="flex justify-center items-center cursor-pointer">
                        @php
                            $user = Auth::user();
                        @endphp
                        @if ($user->image_user)
                            <img src="{{ asset('storage/images/'.$user->image_user) }}" alt="User Avatar"
                                class="w-10 h-10 rounded-full object-cover">
                        @else
                            <img src="{{ asset('images/default-user.jpg') }}" alt="User Avatar"
                                class="w-10 h-10 rounded-full object-cover">
                        @endif
                        <p class="ml-1 capitalize">{{ $user->name }}</p>
                        <i class="bi bi-chevron-down mx-2"></i>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-md bg-white text-gray-700 hover:text-gray-900 px-3 py-2 rounded">
                            <i class="bi bi-box-arrow-in-left"></i>Se deconnecter
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>

        </div>
    </header>

    <!-- Page Container (With Sidebar & Content) -->
    <div class="flex h-screen pt-15">

        <!-- Sidebar (Starts Below Navbar) -->
        <aside
            class="bg-white shadow-lg sm:rounded-lg text-gray-500 w-[14rem] flex flex-col px-2 py-4 absolute md:relative md:translate-x-0">
            <!-- Sidebar Navigation -->
            <x-dropdown-menu>
                <x-slot name='trigger'>
                    <div tabindex="0"
                        class="mt-12 my-4 text-black cursor-pointer hover:bg-gray-800 hover:w-full hover:font-semibold transition-all
                                p-1 hover:rounded text-base hover:text-white focus:bg-gray-800 
                                focus:font-semibold focus:p-1 focus:rounded focus:text-white">
                        <i class="bi bi-card-list mx-1 text-lg "></i>Approbation requêtes
                    </div>
                    </a>
                </x-slot>
                <x-slot name='content'>
                    <nav>
                        <ul>
                            @can('isRse')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('rse.index')}}">>
                                        Rsp planification Suivi-
                                        <br>Evaluation (RSE)</a>
                                </li>
                            @endcan
                            @can('isRsenv')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('rsenv.index')}}">> Rsp
                                        Resp Sauvegarde Env/le et Sociale (RSENV)</a>
                                </li>
                            @endcan
                            @can('isRpm')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{ route('rpm.index')}}">> Bureau
                                        des Marchés (RPM)</a>
                                </li>
                            @endcan
                            @can('isRaf')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('raf.index')}}">> Rsp
                                        Admin et Financier (RAF)</a>
                                </li>
                            @endcan
                            @can('isRai')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('rai.index')}}">> Rsp
                                        Audit Interne (RAI)</a>
                                </li>
                            @endcan
                            @can('isCp')
                                <li class="border-b-2"> <a
                                        class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('cp.index')}}">> Charge
                                        des Programmes (CP)</a></li>
                            @endcan
                            @can('isDP')
                                <li><a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="{{route('dp.index')}}">>
                                        Coordonnateur de Projet (DP)</a>
                                </li>
                            @endcan
                        </ul>
                    </nav>
                </x-slot>
            </x-dropdown-menu>
            <x-dropdown-menu>
                <x-slot name='trigger'>
                    <div tabindex="0"
                        class="mb-4 text-black cursor-pointer hover:bg-gray-800 hover:w-full hover:font-semibold transition-all ease-in-out
                                p-1 hover:rounded hover:text-white focus:bg-gray-800 
                                focus:font-semibold focus:p-1 focus:rounded focus:text-white text-nowrap overflow-hidden">
                        <i class="bi bi-cash mx-1"></i>Approbation de paiements
                    </div>
                    </a>
                </x-slot>
                <x-slot name='content'>
                    <nav>
                        <ul>
                            @can('isRse')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">>
                                        Rsp planification Suivi-
                                        <br>Evaluation (RSE)</a>
                                </li>
                            @endcan
                            @can('isRpm')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">> Bureau
                                        des Marchés (RPM)</a>
                                </li>
                            @endcan
                            @can('isCpt')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">> Comptabilite (CPT)</a>
                                </li>
                            @endcan
                            @can('isRaf')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">> Rsp
                                        Admin et Financier (RAF)</a>
                                </li>
                            @endcan
                            @can('isRai')
                                <li class="border-b-2">
                                    <a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">> Rsp
                                        Audit Interne (RAI)</a>
                                </li>
                            @endcan
                            @can('isCp')
                                <li class="border-b-2"> <a
                                        class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">> Charge
                                        des Programmes (CP)</a></li>
                            @endcan
                            @can('isCp')
                                <li><a class="text-sm block text-slate-700 font-semibold text-nowrap overflow-hidden mb-2"
                                        href="#">>
                                        Coordonnateur de Projet (CA)</a>
                                </li>
                            @endcan
                        </ul>
                    </nav>
                </x-slot>
            </x-dropdown-menu>
            <a tabindex="0" href="{{ route('profile.index') }}"
                class=" text-black hover:bg-gray-800 hover:font-semibold transition-all
                 ease-in-out p-1 hover:rounded hover:text-white focus:bg-gray-800 focus:font-semibold focus:p-1 
                 focus:rounded focus:text-white text-nowrap">
                <i class="bi bi-people-fill mx-1"></i>Gestion des Utilisateus
            </a>
        </aside>
        <!-- Main Content (Starts Below Navbar) -->
        <div class="flex-1 p-6 overflow-auto  bg-[#EBEFF2]">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
