@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebarClinic')
  @include('layouts.sidebarClinic')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')
    <div class="p-4 sm:ml-64">
        <x-aside>
            {{-- Session - Alert --}}
            @if (session('success'))
                @include('alerts.alert-success')
            @elseif (session('info'))
                @include('alerts.alert-info')
            @endif
          <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                {{-- Photo - Profil --}}
                <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">
                    <div class="flex flex-col items-center">
                        {{-- <img src="" alt="" class="w-32 h-32 bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40"> --}}
                        <div class="w-32 uppercase h-32 text-center flex items-center justify-center text-5xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                        {{substr($personal->name, 0, 1)}}
                        {{substr($personal->firstname, 0, 1)}}
                        </div>
                        <h1 class="mx-auto uppercase mt-6 text-center dark:bg-gray-700">
                            {{$personal->name .' '. $personal->firstname}}
                        </h1>
        
                        <p class="text-center capitalize">
                            @if($currentPersonal->clinicUserRoles->isEmpty())
                                <p>Aucun poste attribue.</p>
                            @else
                            @foreach ($currentPersonal->clinicUserRoles as $role)
                                <span class="block  my-4 font-semibold">
                                Role: {{$role->role_name_fr}}
                                </span>
                            @endforeach
                            @endif
                            @foreach ($currentPersonal->clinicsUsers as $clinic )
                                Clinique: {{ $clinic->clinic_name }}
                            @endforeach
                            
                        </p>

                        @if($currentPersonal->clinicUserRoles->isEmpty())
                            <form action="{{route('director.attribute.member.role', ['clinic_id' => $clinic->id, 'personal_id' =>  $personal->id])}}" method="POST" class="mx-auto w-40 mt-4 text-center rounded-lg dark:bg-gray-700">
                                @csrf
                                @method('POST')
                                <label for="underline_select_role" class="sr-only">Attribution de Role</label>
                                <select name="attribute_role" id="underline_select_role" class="block capitalize py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Attribuer un Poste</option>
                                    @forelse ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->role_name_fr}}</option>
                                    @empty
                                    <option value="">Aucun Poste disponible</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('attribute_role')" class="mt-2" />

                                
                                <x-primary-button class="mt-4">
                                    Attribuer
                                </x-primary-button>
                            </form>
                        @else
                        <form action="{{route('director.change.member.role', ['clinic_id' => $clinic->id, 'personal_id' =>  $personal->id])}}" method="POST" class="mx-auto w-40 mt-4 text-center rounded-lg dark:bg-gray-700">
                            @csrf
                            @method('PUT')
                            <label for="underline_select_role" class="sr-only">Attribution de Role</label>
                            <select name="attribute_role" id="underline_select_role" class="block capitalize py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                @foreach ($currentPersonal->clinicUserRoles as $role)
                                <option>
                                Role: {{$role->role_name_fr}}
                                </option>
                                @endforeach
                                @forelse ($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name_fr}}</option>
                                @empty
                                <option value="">Aucun Role disponible</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('attribute_role')" class="mt-2" />
                            
                            <x-primary-button class="mt-4">
                                Changer
                            </x-primary-button>
                        </form>
                        @endif
  
                        {{-- </p> --}}
                        <div class="mt-4 ">
                        
                        </div>
                    </div>
                </div>
                
                {{-- Info - Complexion --}}
                <div class="max-w-4xl xl:col-span-3 p-6 bg-blue-50 rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Infos supplementaires</h2>
                
                    <form>
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols xl:grid-cols-3">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Nom Complet')}}
                                </label>
                                
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_occupation">
                                    {{__('Profession')}}
                                </label>
                                
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_tel">
                                    {{__('Numero')}}
                                </label>
                                
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="position_geaographic">
                                    {{__('Adresse Geographique')}}
                                </label>
                            </div>

                            <div class="xl:col-span-2">
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Allergies Connu et/ou Maladie Hereditaire')}}
                                </label>
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="real_mail">Email</label>
                                
                            </div>

                            <div class="xl:col-span-2">
                                <label class="text-gray-700 dark:text-gray-200" for="complet_name">
                                    {{__('Information Medical Supplementaire')}}
                                </label>
                            </div>
                            
                        </div>
                
                        <div class="flex justify-end mt-6">
                            
                        </div>
                    </form>
                </div>

            </div>
        </x-aside>
    </div>
@endsection