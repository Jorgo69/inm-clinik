@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
<div class="p-4 sm:ml-64">
  <x-aside>
    <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-4">
                
        {{-- Photo - Profil --}}
        <div class="p-4  rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
            <div class="flex flex-col items-center p-8">
                {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                <div class="w-32 h-32 uppercase text-center flex items-center justify-center text-5xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                    {{
                        Str::substr($consultation->patient->name, 0, 1).
                        Str::substr($consultation->patient->firstname, 0, 1)
                    }}
                </div>
                <p class="w-40 h-2 mx-auto mt-6 text-center rounded-lg dark:bg-gray-700">
                    {{$consultation->patient->name .' '. $consultation->patient->firstname}}
                </p>

                <p class="mt-4 text-center rounded-lg dark:bg-gray-700">
                    {{$consultation->patient->email}}
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
                    
                </div>
            </section>
        </div>
    </div>

    <section class="bg-blue-50 dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            @session('success')
                @include('alerts.alert-success')
            @endsession
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">
                {{$consultation->patient->name .' '. $consultation->patient->firstname}}
            </h1>
    
    
            <div class="flex py-4 mt-4 overflow-x-auto overflow-y-hidden md:justify-center dark:border-gray-700">
                <button
                    class="h-12 px-8 py-2 -mb-px text-sm text-center text-blue-600 bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                    Consultation
                </button>
            </div>
    
            <section class="mt-8 space-y-8 lg:mt-12">
                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    {{-- <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2> --}}
                
                    <form action="{{route('member.doctor.consultation.update', ['clinic_id' => $clinic->id, 'consultation_id'=> $consultation->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="summernoteConsultation">Consultation Medical</label>
                                <textarea  id="summernoteConsultation" name="summernoteConsultation" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    {!!$consultation->consultation!!}
                                </textarea>
                                <x-input-error :messages="$errors->get('summernoteConsultation')" class="mt-2" />
                            </div>
                
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="summernotePrescription">Prescription Medical</label>
                                <textarea id="summernotePrescription" name="summernotePrescription" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    {{$consultation->prescription_medical}}
                                </textarea>
                                <x-input-error :messages="$errors->get('summernotePrescription')" class="mt-2" />
                            </div>
                        </div>
                
                        <div class="flex justify-end mt-6">
                            <x-primary-button>Modifier</x-primary-button>
                            
                        </div>
                    </form>
                </section>
            </section>
        </div>
    </section>
  </x-aside>
</div>
@push('summernoteCdnHref')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{asset('assets/js/summernote-fr-FR.min.js')}}"></script>
@endpush
@push('summernoteCdnScript')
<script>
    $('#summernoteConsultation').summernote({
        lang: 'fr-FR', // Change la langue ici
      placeholder: 'Entrer les informations prises a propos de cette consultation',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['help']]
      ]
    });

    $('#summernotePrescription').summernote({
        lang: 'fr-FR', // Change la langue ici
    placeholder: 'Entrer les prescriptions et recommandation pour cette consultation',
    tabsize: 2,
    height: 120,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['help']]
    ]
    });
      
  </script>
@endpush
@endsection