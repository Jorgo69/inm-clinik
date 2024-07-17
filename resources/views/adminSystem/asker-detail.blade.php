@extends('layouts.app')
  
{{-- Side Nav Members --}}
@section('layouts-sidebar')
  @include('layouts.sidebar')
@endsection

{{-- Contenu propore a ce fichier --}}
@section('app-container')

    <div class="p-4 sm:ml-64">
        <x-aside class="">
            @if (Session::has('success'))
            @include('alerts.alert-success')
            @elseif (Session::has('warning'))
            @include('alerts.alert-warning')
            @endif
            <div class="xl:max-w-screen-lg xl:mx-auto p-4">
                <div class="flex flex-col md:flex-row bg-gray-400 shadow-lg rounded-lg overflow-hidden">
                    <!-- Left side: Image, Nom & Prénom -->
                    <div class="md:w-1/3 px-2 py-4">
                        <img class="w-full h-auto object-cover rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                        <div class="p-4">
                            <span class="block">Nom: {{$asker->users->name }}</span>
                            <span class="block">Prénom: {{$asker->users->firstname }}</span>
                            <span class="block">Localisation: </span>
                            <span class="block">Numero: {{$asker->number}}</span>
                            <span class="block">Adresse: {{$asker->adresse}}</span>
                            <span class="block">Sexe: {{$asker->users->gender === 'male' ? 'Homme' : 'Femme' }}</span>
                        </div>
                    </div>
            
                    <!-- Right side: Autres informations -->
                    <div class="md:w-2/3 p-4 grid xl:grid-cols-2 mx-4 gap-4 bg-primary">
                        <div class="text-lg font-semibold bg-danger">Information complementaire</div>
                        <div class="text-lg font-semibold bg-secondary">Autre détail 1</div>
                        <!-- Ajoutez d'autres détails ici -->
                    </div>
                </div>
                <form action="{{route('admin.asker.validate')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="asking_id" value="{{$asker->id}}">
                    @if ($asker->actived !== 'actived')
                    <x-primary-button class="my-2 flex justify-end">
                        Valider
                    </x-primary-button>
                    @else
                    <x-nav-link href="{{route('admin.asker.index')}}" class="my-4">Retour en arriere</x-nav-link>
                    @endif
                </form>
            </div>
        </x-aside>
    </div>

@endsection