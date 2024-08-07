@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')

<div class="p-4 sm:ml-64">
    <x-aside>
        <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                
            {{-- Photo - Profil --}}
            <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                <div class="flex flex-col items-center p-8">
                    {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                    <div class="w-32 h-32 text-center flex items-center justify-center text-5xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                      JL
                    </div>
                    <p class="mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                        Nom Prenom
                    </p>
                    <p class="mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                        Email
                    </p>
                    <p class="mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                        Adresse
                    </p>
                    <p class="mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                        Antecedent
                    </p>
    
                    <p class="mx-auto mt-4 text-center rounded-lg dark:bg-gray-700">
                        
                    </p>
                    <div class="mt-4 ">
                      
                    </div>
                </div>
            </div>
            
            {{-- Info - Complexion --}}
            <div class="max-w-4xl xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Infos sur le RDV</h2>
            
                <section>
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols">
                        
                        <div>
                            <span class="block">{{__('Date et Heure')}}</span>
                            <span>Heure et Date fournir par le patient (peut changer en fonction de la disponibilite du medecin concerner)</span>
                        </div>

                        <div>
                            <span class="block">{{__('Maux')}}</span>
                            <span>Les Maux enumerer par le patient</span>
                        </div>

                        <div class="flex justify-end p-2 xl:h-20 top-10">
                            <x-primary-button>
                                En cours de traitement
                            </x-primary-button>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
        
    </x-aside>
</div>

@endsection