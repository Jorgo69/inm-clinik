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
                            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Toutes mes consultations</h2>
                        </div>
                    </div>
                </div>

                {{-- Tableau avec les consultation du connecte --}}
                @livewire('member.doctor.consultation-index-component', ['clinicId' => $clinicId])

                {{-- Pagination --}}
            </section>
        </x-aside>
    </div>
@endsection