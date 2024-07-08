<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <link rel="shortcut icon" href="{{asset('assets/svg/logo.svg')}}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

            {{-- navigation --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{route('home.index')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{asset('assets/logo-soft-care.png')}}" class="h-8" alt="Logo de clinik" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{config('app.name')}}</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Ouvrir le menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto m-0" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-nav-link href="{{route('home.index')}}" class="text-black">Accueil</x-nav-link>
                <x-nav-link href="{{route('try.about')}}" class="text-black">A propos</x-nav-link>
                <x-nav-link href="{{route('try.offer')}}" class="text-black">Nos Offres</x-nav-link>
                <x-nav-link href="{{route('try.contact')}}" class="text-black">Contactez nous</x-nav-link>

                    <x-nav-link>
                        <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="flex items-center justify-between w-full text-gray-900 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            Caracteristique
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                    </x-nav-link>

                
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Essayer {{config('app.name')}}
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Fermer</span>
                                    </button>
                                </div>
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 place-content-stretch">
                                            <x-text-input placeholder="Nom *" name="name"/>
                                            <x-text-input placeholder="Prenom *" name="firstname"/>
                                            <x-text-input type='date' placeholder="Date de naissance *" name="birthdate" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
                                            <div class="flex items-center me-4 gap-x-4">
                                                <div class="">
                                                    <input checked id="male-red-checkbox" name="gender" type="radio" value="male" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="male-red-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homme</label>
                                                </div>
                                                <div class="">
                                                    <input id="female-green-checkbox" name="gender" type="radio" value="female" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="female-green-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Femme</label>
                                                </div>
                                                <div class="">
                                                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sexe *</label>
                                                </div>
                                            </div>
                                            <x-text-input placeholder="Votre Email *" name="email" />
                                            <x-text-input placeholder="Mot de Passe *" name="password" />
                                            <x-text-input placeholder="Mot de Passe (Confirmation) *" name="confirm_password" />
                                            {{-- <x-text-input placeholder="Pays *" name="country" /> --}}
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <x-primary-button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            {{__('Soumettre')}}
                                        </x-primary-button>
                                        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
                
                {{-- Button --}}
                @guest
                <x-nav-link data-modal-target="default-modal" data-modal-toggle="default-modal" href="#">Essayer Gratuitement</x-nav-link>
                <x-nav-link href="{{route('login')}}">Connexion</x-nav-link>
                @else
                <x-nav-link href="{{route('dashboard')}}" >Dashoard</x-nav-link>
                <x-nav-link href="{{route('logout')}}" >Deconnexion</x-nav-link>
                @endguest
                </ul>
                
            </div>
        </div>
        {{-- Sous Menu --}}
        <div id="mega-menu-full-dropdown" class="mt-1 hidden border-gray-200 shadow-sm bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600">
            <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
                <ul>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Online Stores</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Segmentation</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Marketing CRM</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Online Stores</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Segmentation</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="font-semibold">Marketing CRM</div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Connect with third-party tools that you're already using.</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End navigation --}}

        <main>
            {{$slot}}
        </main>
    

        @include('layouts.footer')

    </body>
</html>