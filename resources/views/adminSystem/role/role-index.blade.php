@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebar')
  @include('layouts.sidebar')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')

    <div class="p-4 sm:ml-64">
        <x-aside>
          @if (session('success'))
            @include('alerts.alert-success')
          @elseif (session('warning'))
            @include('alerts.alert-warning')
          @elseif (session('error'))
            @include('alerts.alert-error')
          @endif
            <div class="xl:grid grid-cols-3 gap-10 mb-4">
                <div class="my-10">
                  Nombre total de role: <span class="hover:font-bold">{{$roles->count()}}</span>;
                  <form action="{{route('admin.add.role')}}" method="POST">
                    @csrf
                    @method('POST')
  
                    {{-- Nom du role --}}
                    <div>
                      <x-input-label for="role_name" :value="__('Nom du role *')" />
                      <x-text-input id="role_name" class="block mt-1 p-2 w-full" type="text" name="role_name" required />
                      <x-input-error :messages="$errors->get('role_name')" class="mt-2" />
                    </div>
                  
                  {{-- Description du role --}}
                  <div>
                    <x-input-label for="role_description" :value="__('Description du role *')" />
                    <x-text-input id="role_description" class="block mt-1 p-2 w-full" type="text" name="role_description" required />
                    <x-input-error :messages="$errors->get('role_description')" class="mt-2" />
                  </div>
  
                  {{-- Bouton --}}
                  <div class="flex items-center justify-end mt-4">        
                    @if ($adder->role === 'admin...system')
                    <x-primary-button class="ms-3">
                      {{ __('Ajouter un rôle') }}
                    </x-primary-button>
                    @endif
                  </div>
  
                  </form>
                </div>
                <div class="my-10">
                </div>
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
            </div>

        </x-aside>
    </div>
    <div class="p-4 sm:ml-64">
      <x-aside>
        <div class="xl:grid grid-cols-3 gap-10 mb-4">
          @forelse ($roles as $role)
          <div class="my-10">
            <div class="relative flex w-auto flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
              {{-- <div class="relative mx-4 -mt-6 size-20 overflow-hidden rounded-full text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                <img src="{{asset('assets/svg/logo.svg')}}" alt="" class="bg-cover bg-center">
              </div> --}}
              <div class="p-6">
                <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                 {{$role->role_name}}
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                {{substr($role->role_description, 0, 10). '...'}}
                </p>
              </div>
              <div class="p-6 pt-0">
                <a data-ripple-light="true" type="button" class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                  voir plus
                </a>
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
                 Nom du role
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
      </x-aside>
    </div>

  @endsection