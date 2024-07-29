@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
<div class="p-4 sm:ml-64">
  <x-aside> 
      <section class="container px-4 mx-auto">
          <div class="sm:flex sm:items-center sm:justify-between">
              <div>
                  <div class="flex items-center gap-x-3">
                      <h2 class="text-lg font-medium text-gray-800 dark:text-white">Pour consultations des Patients</h2>

                      <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 patients</span>
                  </div>

                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Ces patients sont passes au cours des 12 derniers mois.</p>
              </div>

              
          </div>
          
          @livewire('member.consultation.consultation-index-component', ['clinicId' => $clinicId, 'clinic' => $clinic])
          
      </section>
  </x-aside>
</div>
@endsection