@extends('layouts.app')
  @section('layouts-sidebar')
    @include('layouts.sidebar')
  @endsection

{{-- Contenu - Yield Contain --}}
  @section('app-container')

      <div class="p-4 sm:ml-64">
          <x-aside>
            @if (Session::has('success'))
              @include('alerts.alert-success')
            @elseif(Session::has('warning'))
              @include('alerts.alert-warning')
            @endif
              <div class="xl:grid grid-cols-3 gap-10 mb-4">
                <div class="my-10">
                  <span class=" {{$clinics->count() === 0 ? 'block' : '' }}">Nombre total de clinique a mon actif :</span>
                  <span class="font-bold">{{$clinics->count() > 0 ? $clinics->count() : ' Aucune clinique a mon actif'}}</span>
                  <form action="{{route('director/add/clinic')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nom de la clinique --}}
                    <div>
                      <x-input-label for="clinic_name" :value="__('Nom de la clinique *')" />
                      <x-text-input id="clinic_name" class="block mt-1 p-2 w-full" type="text" name="clinic_name" required />
                      <x-input-error :messages="$errors->get('clinic_name')" class="mt-2" />
                    </div>
                  
                  {{-- Description de la clinique --}}
                  <div>
                    <x-input-label for="clinic_description" :value="__('Description de la clinique *')" />
                    <x-text-input id="clinic_description" class="block mt-1 p-2 w-full" type="text" name="clinic_description" required />
                    <x-input-error :messages="$errors->get('clinic_description')" class="mt-2" />
                  </div>

                  {{-- Adresse Geographique --}}
                  <div>
                    <x-input-label for="clinic_geographic_adress" :value="__('Adresse Geographique de la clinique')" />
                    <x-text-input id="clinic_geographic_adress" class="block mt-1 p-2 w-full" type="text" name="clinic_geographic_adress" required />
                    <x-input-error :messages="$errors->get('clinic_geographic_adress')" class="mt-2" />
                  </div>

                  {{-- Logo de la clinique --}}
                  <div>
                    <x-input-label for="clinic_logo" :value="__('Logo de la clinique *')" />
                    <x-text-input id="clinic_logo" class="block mt-1 p-2 w-full" type="file" name="clinic_logo" required />
                    <x-input-error :messages="$errors->get('clinic_logo')" class="mt-2" />
                  </div>

                  {{-- Le Mail et le contact fix --}}
                  <div class="flex items-center justify-end mt-4">
                    <div class="">
                      <x-input-label for="clinic_mail" :value="__('Email de la clinic *')" />
                      <x-text-input id="clinic_mail" class="block mt-1 p-2 mr-1 w-full" type="email" name="clinic_mail" required />
                      <x-input-error :messages="$errors->get('clinic_mail')" class="mt-2" />
                    </div>
                    <div class="">
                      <x-input-label for="clinic_number" :value="__('Numero de la clinic *')" />
                      <x-text-input id="clinic_number" class="block mt-1 p-2 ml-1 w-full" type="text" name="clinic_number" required />
                      <x-input-error :messages="$errors->get('clinic_number')" class="mt-2" />
                    </div>
                  </div>

                  {{-- Bouton --}}
                  <div class="flex items-center justify-end mt-4">
                    @if ($adder->role !== 'patient')
                    <x-primary-button class="ms-3">
                        {{ __('Inscrire ma clinique') }}
                    </x-primary-button>
                    @endif
                  </div>

                  </form>
                </div>
              </div>
          </x-aside>
      </div>
      <div class="p-4 sm:ml-64">
        <x-aside>
              {{-- List des cliniques --}}
              <div class="xl:grid grid-cols-3 gap-10 mb-4">
                @forelse ($clinics as $clinic)
                <div class="my-10">
                  <div class="relative flex w-auto flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="relative mx-4 -mt-6 size-20 overflow-hidden rounded-full text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                      <img src="{{$clinic->LogoUrl()}}" alt="clinic logo" class="bg-cover bg-center w-full h-18">

                    </div>
                    <div class="p-6">
                      <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                      {{$clinic->clinic_name}}
                      </h5>
                      <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      {{substr($clinic->clinic_description, 0, 40). '...'}}
                      </p>
                      {{-- {{$clinic->countUsersClinics()}} --}}
                    </div>
                    <div class="p-6 pt-0">
                      <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        <a href="{{route('director.clinic.detail', ['id' => $clinic->id])}}">{{__('Voir plus')}}</a>
                      </button>
                    </div>
                  </div>
                </div>

                @empty
                  <div class="my-10">
                    <div class="relative flex w-auto flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                      <div class="relative mx-4 -mt-6 size-20 overflow-hidden rounded-full text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                        <img src="{{asset('assets/svg/logo.svg')}}" alt="" class="bg-cover bg-center">
                      </div>
                      <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        Nom de la clinique
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                        Une description de 10 mots maximum sinon ...
                        </p>
                      </div>
                      <div class="p-6 pt-0">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                          voir plus
                        </button>
                      </div>
                    </div>
                  </div>
                @endforelse
              </div>
              {{-- End List des cliniques --}}

              <button type="button" data-modal-toggle="user-modal">
                <svg class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                </svg>
                Details
              </button>
          </x-aside>
      </div>
      
  @endsection