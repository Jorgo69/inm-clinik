<div>
    {{-- Recherche --}}
    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                Tout voir
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Recent
            </button>

            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Ancien
            </button>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input wire:model.live.debounce.500ms='search' type="text" id="search-input" placeholder="Rechercher un patient" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>
    </div>

    {{-- Tableau --}}
    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Image</th>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Nom et Prenom</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Sexe
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Action</th>

                            </tr>
                        </thead>
                        <tbody id="resultats" class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @forelse ($patients as $patient)
                            <tr 
                            @if ($loop->odd)
                                class="bg-gray-50"
                            @endif>
                                <td class="px-4 data_table py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <img class="object-cover size-10 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt=""> --}}
                                        <p class="size-12 uppercase text-center flex items-center justify-center text-xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                                            {{
                                                Str::substr($patient->name, 0, 1).
                                                Str::substr($patient->firstname, 0, 1)
                                            }}
                                        </p>
                                    </div>
                                </td>

                                <td class="px-4 capitalize py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{$patient->name .' '. $patient->firstname}}</h2>
                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{$patient->email}}</p>
                                    </div>
                                </td>
                                
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full {{$patient->gender == 'male' ? 'text-emerald-500 bg-emerald-100/60 ' : 'text-red-500 bg-red-100/60'}}  gap-x-2  dark:bg-gray-800">
                                        {{$patient->gender == 'male' ? 'Homme' : 'Femme'}}
                                    </div>
                                </td>
                                

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            {{-- Modal --}}
                                            <div x-data="{ isOpen: false }" class="relative inline-block ">
                                                <!-- Dropdown toggle button -->
                                                <button @click="isOpen = !isOpen" class="relative z-10 block p-2 text-gray-700 bg-white border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                    </svg>
                                                </button>
                                            
                                                <!-- Dropdown menu -->
                                                <div x-show="isOpen" 
                                                @click.away="isOpen = false"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="opacity-0 scale-90"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-100"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-90"
                                                class="absolute bottom-0 right-0 z-100 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800">
                                                    <a href="{{ route('member.patient.show.detail', ['clinic_id' => $clinicId, 'patient_id' => $patient->id]) }}" class="details-link block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                        <x-svg-detail/>
                                                        Detail
                                                    </a>
                                                    <a data-modal-target="{{$patient->id}}" tetete data-modal-toggle="{{$patient->id}}" type="button" href="#" class="appointment-link block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                        <x-svg-appointment/>
                                                        RDV
                                                    </a>
                                                </div>
                                                @include('livewire.member.patient.patient-rdv-modal')
                                            </div>
                                            {{-- End Modal --}}
                                        </div>
                                </td>
                            </tr>
                            
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-sm text-center">
                                    <div class="flex justify-center">
                                        <img src="{{ asset('assets/svg/undraw-no-data.svg') }}" alt="no-data" class="size-20">
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            {{-- Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>  --}}
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            {{-- {{$patients->links()}} --}}
        </div>
    </div>

    {{-- Modal Detail --}}
    <!-- Main modal -->
  {{-- <div
  x-data= "{show: false, patientId: '{{$patient->id ? $patient->id : ''}}'}"
  x-show = "show "
  x-on:open-modal.window = "show = ($event.detail.patientId === patientId) "
  x-on:open-modal.window = "show = !($event.detail.patientId === patientId) "
  x-on:keydown.escape.window = "show = false"
  x-data="{ patientId: null }"

    class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Ajouter un RDV
              </h3>
              <button x-on:click="$dispatch('close-modal')"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                  <svg x-on:click="show= false" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Fermer le modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form class="p-4 md:p-5" x-bind:action="'{{ route('member.secretary.store.appointment', ['clinic_id' => $clinicId]) }}' + '&patient_id=' + patientId">
              @csrf
              <input type="hidden" name="patient_id" x-bind:value="patientId">
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
      </div>
  </div>
</div>  --}}

    {{-- End Modal Detail --}}
</div>
