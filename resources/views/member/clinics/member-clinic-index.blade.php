@extends('layouts.app')

    @section('layouts-sidebar')
        @include('layouts.sidebar')
    @endsection

    @section('app-container')

    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            {{-- Pour l'animation comme si sa chargeait --}}
            {{-- <div class="container px-6 py-10 mx-auto animate-pulse"> --}}
    
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
                @forelse ($clinics as $clinic)
                <div class="flex flex-col items-center p-8">
                    <img src="{{$clinic->LogoUrl()}}" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                    <h1 class="w-40 h-2 mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">{{ $clinic->clinic_name }}</h1>
    
                    <p class="mx-auto mt-4 text-center rounded-lg dark:bg-gray-700">
                        {{substr($clinic->clinic_description, 0, 50). '...'}}
                    </p>
    
                    <div class="w-56 h-2 mx-auto mt-4 text-center">
                        <div class="flex justify-center">
                            <a href="{{route('member-director.clinic.detail', ['clinic_id' => $clinic->id])}}" data-ripple-light="true" type="button" class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                Entrer dans la clinique
                                </a>
                        </div>
                    </div>
                </div>
                @empty

                Aucune clinique
                
                @endforelse
            </div>
        </div>
    </section>
    @endsection