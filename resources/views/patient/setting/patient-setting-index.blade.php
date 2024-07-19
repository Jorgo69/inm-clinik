@extends('layouts.app')

    @section('app-container')

    <section class="bg-white dark:bg-gray-900">

        <div class="container mt-20 px-6 py-12 mx-auto">
            
            @if (session('success'))
                @include('alerts.alert-success')
            @endif

            <div>
                <p class="font-medium text-blue-500 dark:text-blue-400">Parametre</p>
            </div>
    
            <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                
                {{-- Photo - Profil --}}
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    <div class="flex flex-col items-center p-8">
                        {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                        <p src="" alt="" class="w-32 h-32 flex items-center justify-center text-5xl font-extra-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">{{__('JL')}}</p>
                        <h1 class="w-40 h-2 mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">Nom et Prenom</h1>
        
                        <p class="mx-auto mt-4 text-center rounded-lg dark:bg-gray-700">
                            
                        </p>
                        <div class="mt-4 ">
                            <div class="flex justify-end">
                                <a href="" data-ripple-light="true" type="button" class="select-none rounded-lg flex bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                    <svg class="size-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                        </path>
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z">
                                        </path>
                                    </svg>
                                    Changer de Photo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Info - Complexion --}}
                <div class="max-w-4xl xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Completer les infos</h2>
                
                    <form>
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols xl:grid-cols-3">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Nom Complet')}}
                                </label>
                                <input id="complet_name" value="{{$user->name .' '. $user->firstname}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_occupation">
                                    {{__('Profession')}}
                                </label>
                                <input id="real_occupation" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_tel">
                                    {{__('Numero')}}
                                </label>
                                <input id="real_tel" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="position_geaographic">
                                    {{__('Adresse Geographique')}}
                                </label>
                                <input id="position_geaographic" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div class="xl:col-span-2">
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Allergies Connu et/ou Maladie Hereditaire')}}
                                </label>
                                <textarea name="" id="" cols="1" rows="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">

                                </textarea>
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_mail">Email</label>
                                <input id="real_mail" value="{{$user->email}}" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div class="xl:col-span-2">
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Information Medical Supplementaire')}}
                                </label>
                                <textarea name="" id="" cols="1" rows="1" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">

                                </textarea>
                            </div>
                            
                        </div>
                
                        <div class="flex justify-end mt-6">
                            <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2">

    
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    @include('profile.partials.update-profile-information-form')
                </div>
    
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </section>

    @endsection