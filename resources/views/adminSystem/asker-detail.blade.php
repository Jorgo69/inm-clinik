<x-app-layout>
    <div class="p-4 sm:ml-64">
        <x-aside class="">
            <div class="xl:max-w-screen-lg xl:mx-auto p-4">
                <div class="flex flex-col md:flex-row bg-gray-400 shadow-lg rounded-lg overflow-hidden">
                    <!-- Left side: Image, Nom & Prénom -->
                    <div class="md:w-1/3 px-2 py-4">
                        <img class="w-full h-auto object-cover rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                        <div class="p-4">
                            <span class="block">Nom Prénom:</span>
                            <span class="block">Localisation: </span>
                            <span class="block">Numero: </span>
                            <span class="block">Adresse: </span>
                            <span class="block">Sexe: </span>
                        </div>
                    </div>
            
                    <!-- Right side: Autres informations -->
                    <div class="md:w-2/3 p-4 grid xl:grid-cols-2 mx-4 gap-4 bg-primary">
                        <div class="text-lg font-semibold bg-danger">Information complementaire</div>
                        <div class="text-lg font-semibold bg-secondary">Autre détail 1</div>
                        <!-- Ajoutez d'autres détails ici -->
                    </div>
                </div>
                <x-primary-button class="my-2 flex justify-end">
                    Valider
                </x-primary-button>
            </div>
        </x-aside>
    </div>
</x-app-layout>