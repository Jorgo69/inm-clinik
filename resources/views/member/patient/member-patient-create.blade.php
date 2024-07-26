@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
    <div class="p-4 sm:ml-64">
        <x-aside>
            @if (session('success'))
            @include('alerts.alert-success')                
            @endif
            <section class="container px-4 mx-auto">
                
                <div class="mt-6 md:flex md:items-center md:justify-between">
                    
                </div>
                <div class="flex flex-col mt-6">
                    <form method="POST" action="{{ route('member.patient.store', ['clinic_id' => $clinic->id]) }}">
                        @csrf
                
                        <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2">
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
                    
                                                            
                            <!-- Email Address -->
                            <div class="">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
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
    
                        <div class="flex items-center justify-end mt-4">            
                            <x-primary-button class="ms-4">
                                {{ __('Inscription') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </section>
        </x-aside>
    </div>
@endsection