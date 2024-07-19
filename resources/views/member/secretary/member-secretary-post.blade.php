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
            <div id="add-rdv-secretary-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                <div class="bg-white p-5 rounded-lg">
                    <!-- Contenu du modal -->
                    <h2 class="text-lg font-bold">Ajouter un RDV</h2>
                    <!-- Votre formulaire ou autre contenu ici -->
                    <button type="button" class="close-modal" data-modal-target="#add-rdv-secretary-modal">Fermer</button>
                </div>
            </div>
        
            <!-- Bouton pour ouvrir le modal -->
            <button type="button" data-modal-target="#add-rdv-secretary-modal">Ajouter un RDV</button>

            <div class="flex items-center mt-4 gap-x-3">

                <button data-modal-target="add-rdv-secretary-modal" data-modal-toggle="add-rdv-secretary-modal" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Ajouter RDV</span>
                </button>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">
            <div class="relative flex items-center mt-4 md:mt-0">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
            
                <input type="text" id="search" placeholder="Rechercher un patient" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>  
        </div>
          
        
        <ul id="results" class="mt-2 bg-white border border-gray-200 rounded-lg shadow-md"></ul>
        
        @push('jquery')            
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez tous les boutons qui ouvrent les modals
    var modalButtons = document.querySelectorAll('[data-modal-target]');
    var modals = document.querySelectorAll('.modal');

    modalButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var target = button.getAttribute('data-modal-target');
            var modal = document.querySelector(target);
            if (modal) {
                modal.classList.remove('hidden');
            } else {
                console.error('Modal with id ' + target + ' does not exist.');
            }
        });
    });

    // Ajoutez des écouteurs d'événements pour fermer les modals
    modals.forEach(function(modal) {
        var closeButton = modal.querySelector('.close-modal');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });
});


        </script>
        @endpush

        <form class="p-4 md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient</label>
                    <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex: Maux de Tete, Fievre" required="">
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="datetime-local" name="" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Les Maux enumeres par la patient"></textarea>                    
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Ajouter RDV
            </button>
        </form>
      </section>
  </x-aside>
</div>
@endsection