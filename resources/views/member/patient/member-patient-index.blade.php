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
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-x-3">
                            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Liste des Patients</h2>

                            {{-- <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{$patients->count()}} potentiel patients</span> --}}
                        </div>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Ces patients sont passes au cours des 12 derniers mois.</p>
                    </div>

                    <div class="flex items-center mt-4 gap-x-3">

                        <button data-modal-target="add-rdv-secretary-modal" data-modal-toggle="add-rdv-secretary-modal" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
      
                            <span>Ajouter Patient</span>
                        </button>
                    </div>
                </div>
                @include('member.patient.member-patient-modal-create')
                

                {{-- Recherche --}}
                {{-- {{ route('member.patient.show.detail', ['clinic_id' => '$clinicId', 'patient_id' => '$patientId']) }} --}}
                {{-- Tableau --}}
                @livewire('member.patient.patient-index-component', ['clinicId' => $clinicId])
                
                {{-- Navigation --}}

            </section>
        </x-aside>
    </div>
    
@endsection