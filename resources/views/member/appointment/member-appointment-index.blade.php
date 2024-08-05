@extends('layouts.app')

    @section('layouts-sidebarClinic')
        @include('layouts.sidebarClinic')
    @endsection

    @section('app-container')

    <div class="p-4 sm:ml-64">
        <x-aside> 
            <section class="container px-4 mx-auto">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-x-3">
                            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Tous les RDV de la clinique: {{$clinic->clinic_name}}</h2>
      
                            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 patients</span>
                        </div>
      
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Ces patients sont potentiellement passes au cours des 12 derniers mois.</p>
                    </div>
                </div>
      
                
                
                {{-- Tableau - Livewire --}}
                @livewire('member.appointment.appointment-index-component', ['clinic' => $clinic, 'clinicId' => $clinicId])
                {{-- End Tableau - Livewire --}}
      
                {{-- <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span> 
                    </div>
      
                    <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                        {{$appointments->links()}}
                    </div>
                </div> --}}
            </section>
        </x-aside>
      </div>
    @endsection