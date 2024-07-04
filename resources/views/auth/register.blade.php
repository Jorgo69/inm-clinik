<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prenom -->
        <div>
            <x-input-label for="firstname" :value="__('Prenom')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Date de Naissance -->
        <div>
            <x-input-label for="birthdate" :value="__('Date de Naissance')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <!-- Le Sexe: Le Genre -->
        <div class="flex items-center my-2 gap-x-4">
            
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
        <!-- Le Type: Compte -->
        <div class="flex items-center my-2 gap-x-4">
            
            <div class="">
                <input id="directot-red-checkbox" name="role" type="radio" value="director" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="directot-red-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Directeur</label>
            </div>
            <div class="">
                <input checked id="patient-green-checkbox" name="role" type="radio" value="patient" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="patient-green-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Simple Utilisateur</label>
            </div>
            <div class="">
                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type de compte</label>
            </div>
        </div>
        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de Passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme Mdp')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Déjà Inscrits?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Inscription') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
