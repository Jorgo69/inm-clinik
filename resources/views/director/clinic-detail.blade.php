  @extends('layouts.app')
  
    @section('layouts-sidebarClinic')
      @include('layouts.sidebarClinic')
    @endsection
  
  {{-- Contenu - Yield Contain --}}
  @section('app-container')
    <div class="p-4 sm:ml-64">
      <x-aside>
          <div class="xl:grid grid-cols mb-4">
              <div class="my-10">
                  <div class="relative flex w-auto flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="relative mx-4 -mt-6 size-20 overflow-hidden rounded-full text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                      <img src="{{$clinic->LogoUrl()}}" alt="" class="bg-cover bg-center">
                    </div>
                    <div class="px-4 py-2">
                      <h5 class="mb-2 block text-2xl font-bold leading-snug tracking-normal text-blue-gray-900 antialiased">
                      {{$clinic->clinic_name}}
                      </h5>
                      {{-- <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      Une description de 10 mots maximum sinon ...
                      </p> --}}
                    </div>
                    <div class="mx-2 my-1 inline-flex">
                      <div class="">
                          <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd">
                              </path>
                          </svg>
                      </div>
                      <div class="">
                          <p>: {{$clinic->clinic_geographic_adress}}</p>
                      </div>
                    </div>
                    <div class="mx-3 my-1 inline-flex">
                      <div class="">
                          Email de la clinique:
                      </div>
                      <div class="">
                          <p>{{$clinic->clinic_mail}}</p>
                      </div>
                    </div>
                    <div class="mx-3 my-1 inline-flex">
                      <div class="">
                          Numero fix de la clinique:
                      </div>
                      <div class="">
                          <p>{{$clinic->clinic_name}}</p>
                      </div>
                    </div>
                    <div class="mx-3 my-1 inline-flex">
                      <div class="">
                          Nombre total de personnel:
                      </div>
                      <div class="">
                          <p>{{$clinicCount}}</p>
                      </div>
                    </div>

                    <div class="m-6">
                    </div>
                  </div>
              </div>
            </div>
      </x-aside>
  </div>
  @endsection
    