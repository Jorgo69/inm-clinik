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
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">Prendre RDV pour 
                        {{$patient->gender === 'male' ? 'Mr' : 'M'}}
                        {{$patient->name. ' '. $patient->firstname}}
                    </h2>

                    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 RDV a sont actif</span>
                </div>
            </div>
        </div>
        @if (session('success'))
        @include('alerts.alert-success')            
        @endif
        <div class="mt-6 md:flex md:items-center md:justify-between">
            
        </div>
        <form method="POST" class="p-4 md:p-5" action="{{route('member.secretary.store.appointment', ['clinic_id'=> $clinic->id, 'patient_id'=> $patient->id])}}">
            @csrf
            @method('POST')
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @error('date')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="time" name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" min="{{ \Carbon\Carbon::now()->format('i-s') }}">
                    @error('time')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                    <textarea name="reason" id="reason" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Les Maux enumeres par la patient"></textarea>
                    @error('reason')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Ajouter RDV
            </button>
        </form>
      </section>
  </x-aside>
</div>
@endsection