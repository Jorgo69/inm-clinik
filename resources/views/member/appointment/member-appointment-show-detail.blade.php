@extends('layouts.app')

    @section('layouts-sidebarClinic')
        @include('layouts.sidebarClinic')
    @endsection

    @section('app-container')

    <div class="p-4 sm:ml-64">
        <x-aside>
            @if (session('success'))
                @include('alerts.alert-success')
            @elseif (session('error'))
                @include('alerts.alert-error')
            @endif
            <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    
                {{-- Photo - Profil --}}
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    <div class="flex flex-col items-center p-8">
                        {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                        <div class="w-32 h-32 text-center flex items-center justify-center text-5xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                            {{
                                Str::substr($appointment->patientAppointment->name, 0, 1).
                                Str::substr($appointment->patientAppointment->firstname, 0, 1)
                            }}
                        </div>
                        <p class="mt-6 text-center rounded-lg dark:bg-gray-700">
                            {{$appointment->patientAppointment->name .' '. $appointment->patientAppointment->firstname}}
                        </p>
        
                        <p class="mt-4 text-center rounded-lg dark:bg-gray-700">
                            {{$appointment->patientAppointment->email}}
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
                    </section>
                </div>
            </div>
    
            {{-- Tableau --}}
            <section class="container px-4 mt-6 mx-auto">
                
                <div class="xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">A propos du Rendez-vous</h2>
                
                    <section>
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols xl:grid-cols-3">
                            
                            <div>
                                <span class="block">{{__('Date & Heure')}}</span>
                                <span>
                                    {{\Carbon\Carbon::parse($appointment->date)->translatedFormat('l jS F Y')}}
                                    {{$appointment->time}}</span>
                            </div>
    
                            <div>
                                <span class="block">{{__('Maux Enumerer')}}</span>
                                <span>{{$appointment->reason}}</span>
                            </div>
                            <div class="">
                                
                                <div class="flex items-center justify-end bottom-0">
                                    @if ($appointment->statut === 'in_progress')
                                    <form action="{{route('member.appointment.accept', ['appointment_id' => $appointment->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <x-primary-button>
                                            Prendre Ce RDV
                                        </x-primary-button>
                                    </form>
                                    @elseif($appointment->concerned_id === Auth::id())
                                    <x-primary-button>
                                        Annuler
                                    </x-primary-button>
                                    @else
                                    <x-primary-button>
                                        Deja pris
                                    </x-primary-button>
                                    @endif
                                    
                                </div>
                            </div>
                            
                        </div>
                    </section>
                </div>
                
            </section>
        </x-aside>
    </div>

    
    @endsection