@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebar')
  @include('layouts.sidebar')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
    <div class="p-4 sm:ml-64">
        <x-aside class="">
            <section class="bg-white dark:bg-gray-900">
                <div class="max-w-6xl px-6 py-10 mx-auto">
                    <p class="text-xl font-medium text-blue-500 ">A propos de {{ $asker->askers->name }}</p>

                    {{-- <h1 class="mt-2 text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
                        What clients saying
                    </h1> --}}
                @if (session('success'))
                    @include('alerts.alert-success')                    
                @endif

                <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                
                    {{-- Photo - Profil --}}
                    <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                        <div class="flex flex-col items-center p-8">
                            {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                            <p src="" alt="" class="w-32 h-32 uppercase flex items-center justify-center text-5xl font-extra-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                                {{
                                    Str::substr($asker->askers->name, 0, 1).
                                    Str::substr($asker->askers->firstname, 0, 1)
                                }}
                            </p>
                            <h1 class="w-40 h-2 mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">Nom et Prenom</h1>
            
                            <p class="mx-auto mt-4 text-center rounded-lg dark:bg-gray-700">
                                
                            </p>
                            
                        </div>
                    </div>
                    
                    {{-- Info - Complexion --}}
                    <div class="max-w-4xl xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Infos supplementaires</h2>
                    
                        
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols xl:grid-cols-3">
                                                                
                            </div>
                    
                            <div class="flex justify-end mt-6">
                                
                                <div class="flex items-center justify-between mt-6 md:justify-start">
                                    <button title="Annuler" class="p-2 bg-primary text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 hover:bg-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                          </svg>                                          
                                    </button>

                                    <form action="{{route('director.asker.validator', ['asking_id' => $asker->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                        @if ($asker->statut === 'waiting')
                                        <button title="Valider" class="p-2 bg-primary text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 md:mx-6 hover:bg-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>
                                        @endif
                                    </form>
                                </div>
                                
                            </div>
                    </div>
                </div>

                </div>
            </section>
        </x-aside>
    </div>
@endsection