@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
<div class="p-4 sm:ml-64">
    <x-aside>
        <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                
            {{-- Photo - Profil --}}
            <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                <div class="flex flex-col items-center p-8">
                    {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                    <div class="w-32 h-32 uppercase text-center flex items-center justify-center text-5xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                        {{
                            Str::substr($patient->name, 0, 1).
                            Str::substr($patient->firstname, 0, 1)
                        }}
                    </div>
                    <p class="w-40 h-2 mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                        {{$patient->name .' '. $patient->firstname}}
                    </p>
    
                    <p class="mt-4 text-center rounded-lg dark:bg-gray-700">
                        {{$patient->email}}
                    </p>
                    <div class="mt-4 ">
                      
                    </div>
                </div>
            </div>
            
            {{-- Info - Complexion --}}
            <div class="max-w-4xl xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Infos Supplementaire</h2>
            
                <section>
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols xl:grid-cols-3">
                        
                        <div>
                            <span class="block">{{__('Profession')}}</span>
                            <span>Travaille enreigistrer par le patient</span>
                        </div>

                        <div>
                            <span class="block">{{__('Numero de telephone')}}</span>
                            <span>Numero du Patient</span>
                        </div>

                        <div>
                            <span class="block">{{__('Adresse Geographique')}}</span>
                            <span>Residence du Patient</span>
                        </div>

                        <div>
                            <span class="block">{{__('Profession')}}</span>
                            <span>Travaille enreigistrer par le patient</span>
                        </div>
                        
                    </div>
                    <div class="flex items-end justify-end bottom-0">
                        <x-nav-link href="{{route('member.consultation.detail.show', ['clinic_id'=> $clinic->id, 'patient_id' => $patient->id])}}">
                            Consultation
                        </x-nav-link>
                        <x-nav-link href="{{route('member.secretary.reserving', ['clinic_id'=> $clinic->id, 'patient_id' => $patient->id])}}">
                            Prendre RDV
                        </x-nav-link>
                    </div>
                </section>
            </div>
        </div>

        {{-- Tableau --}}
        <section class="container px-4 mt-6 mx-auto">
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
                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-3 focus:outline-none">
                                                <span>Date et Heure</span>
                                            </button>
                                        </th>

                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Docteur
                                        </th>

                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Role</th>

                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    
                                    @forelse ($consultations as $consultation)
                                    <tr>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center">
                                                <p class="inline uppercase px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    {{\Carbon\Carbon::parse($consultation->created_at)->translatedFormat('l jS F Y')}}
                                                    à
                                                    {{\Carbon\Carbon::parse($consultation->created_at)->translatedFormat('H : i')}}
                                                </p>
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <h2 class="font-medium text-gray-800 dark:text-white ">
                                                    {{$consultation->concerned->name}}
                                                </h2>
                                                <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                    {{$consultation->concerned->email}}
                                                </p>
                                            </div>
                                        </td>
                                        
                                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                            {{-- <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800"> --}}
                                            <div class="inline px-3 py-1 text-sm font-normal rounded-full text-red-500 gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                {{$consultation->theClinic->clinic_name}}
                                            </div>
                                        </td>
                                        

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                                    
                                                    <x-nav-link href="" class="font-medium mx-4 text-gray-500 dark:text-blue-500 hover:underline">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                        Details
                                                    </x-nav-link>
                                                </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="4">Aucune consultation effectuer pour le moment</td>
                                    </tr>
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