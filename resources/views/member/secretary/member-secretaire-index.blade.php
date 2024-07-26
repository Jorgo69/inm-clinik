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
                      <h2 class="text-lg font-medium text-gray-800 dark:text-white">Tous les RDV</h2>

                      <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 patients</span>
                  </div>

                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Ces rendez-vous sont passes au cours des 12 derniers mois.</p>
              </div>

              <div class="flex items-center mt-4 gap-x-3">

                  <button data-modal-target="add-rdv-secretary-modal" data-modal-toggle="add-rdv-secretary-modal" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                      <span>Ajouter RDV</span>
                  </button>
              </div>
          </div>
          @include('member.secretary.member-secretary-modal-create')

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

                  <input type="text" placeholder="Rechercher un patient" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
              </div>
          </div>

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
                                          Status
                                      </th>

                                      <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Maux
                                    </th>

                                      <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Action</th>
                                  </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @forelse ($appointments as $appointment)
                                <tr>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- <img class="object-cover size-10 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt=""> --}}
                                            <p class="size-12 uppercase text-center flex items-center justify-center text-xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                                                {{
                                                    Str::substr($appointment->patientAppointment->name, 0, 1).
                                                    Str::substr($appointment->patientAppointment->firstname, 0, 1)
                                                }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <h2 class="font-medium text-gray-800 dark:text-white ">
                                                {{$appointment->patientAppointment->name .' '. $appointment->patientAppointment->firstname}}
                                            </h2>
                                            <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                {{$appointment->patientAppointment->email}}
                                            </p>
                                        </div>
                                    </td>
                                    
                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                        <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                            {{$appointment->statut === 'in_progress' ? 'En Cours' : 'Accepter'}}
                                        </div>
                                    </td>

                                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                            {{substr($appointment->reason, 0, 20). '...'}}
                                    </td>
                                    

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                                
                                                <x-nav-link href="#" class="font-medium mx-4 text-gray-500 dark:text-blue-500 hover:underline">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    Details
                                                </x-nav-link>
                                            </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="px-4 py-4 text-sm text-center">Aucun Rendez-vous pour le moment</td></tr>
                                @endforelse
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

          <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
              <div class="text-sm text-gray-500 dark:text-gray-400">
                  Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span> 
              </div>

              <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                  <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                      </svg>

                      <span>
                          previous
                      </span>
                  </a>

                  <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                      <span>
                          Next
                      </span>

                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                      </svg>
                  </a>
              </div>
          </div>
      </section>
  </x-aside>
</div>
@endsection