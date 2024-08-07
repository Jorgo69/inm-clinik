@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebar')
  @include('layouts.sidebar')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')

@if (auth()->user()->role != 'patient')
<div class="pt-10 sm:ml-64">          
  <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
          <p class="text-base font-semibold text-indigo-600">403</p>
          <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Il y a un probleme</h1>
          <p class="mt-6 text-base leading-7 text-gray-600">{!! $exception ? $exception->getMessage() : ''!!}</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{route('dashboard')}}" class="rounded-md mx-2 bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Aller a la page d'Accueil</a>
            <a href="#" class="text-sm font-semibold text-gray-900">Service de support<span aria-hidden="true">&rarr;</span></a>
          </div>
        </div>
    </main>
  </div>
</div>
@endif

@endsection