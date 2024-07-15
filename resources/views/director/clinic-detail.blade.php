<x-app-layout>
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
    <div class="p-4 sm:ml-64">
      <x-aside>
        <section class="bg-white dark:bg-gray-900">
          <div class="max-w-6xl px-6 py-10 mx-auto">
              <p class="text-xl font-medium text-blue-500 ">La clinique</p>
      
              <h1 class="mt-2 text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
                {{$clinic->clinic_name}}
              </h1>
      
              <main class="relative z-20 w-full mt-8 md:flex md:items-center xl:mt-12">
                  <div class="absolute w-full bg-blue-600 -z-10 md:h-96 rounded-2xl"></div>
                  
                  <div class="w-full p-6 bg-blue-600 md:flex md:items-center rounded-2xl md:bg-transparent md:p-0 lg:px-12 md:justify-evenly">
                      <img class="h-24 w-24 md:mx-6 rounded-full object-cover shadow-md md:h-[32rem] md:w-80 lg:h-[36rem] lg:w-[26rem] md:rounded-2xl" src="{{$clinic->LogoUrl()}}" alt="client photo" />
                      
                      <div class="mt-2 md:mx-6">
                          <div>
                              <p class="text-xl font-medium tracking-tight text-white">
                                {{$clinic->adder->name .' '. $clinic->adder->firstname}}
                              </p>
                              <p class="text-blue-200 ">Poste</p>
                          </div>
      
                          <p class="mt-4 text-lg leading-relaxed text-white md:text-xl">
                             “{{$clinic->clinic_description}}”.</p>
                          
                          {{-- <div class="flex items-center justify-between mt-6 md:justify-start">
                              <button title="left arrow" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 hover:bg-blue-400">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                  </svg>
                              </button>
      
                              <button title="right arrow" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 md:mx-6 hover:bg-blue-400">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                  </svg>
                              </button>
                          </div> --}}
                      </div>
                  </div>
              </main>
          </div>
        </section>
      </x-aside>
    </div>
</x-app-layout>