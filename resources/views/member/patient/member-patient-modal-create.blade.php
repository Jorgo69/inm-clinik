
  <!-- Main modal -->
  <div id="add-rdv-secretary-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ajouter un RDV
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-rdv-secretary-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{ route('member.patient.store', ['clinic_id' => $clinic->id]) }}">
                @csrf

                <div class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2">
                    <!-- Nom -->
                    <div>
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Prenom -->
                    <div>
                        <x-input-label for="firstname" :value="__('Prenom')" />
                        <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>

                    <!-- Date de Naissance -->
                    <div>
                        <x-input-label for="birthdate" :value="__('Date de Naissance')" />
                        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>

                                                    
                    <!-- Email Address -->
                    <div class="">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Le Sexe: Le Genre -->
                <div class="flex items-center my-2 gap-x-4">
                    
                    <div class="">
                        <input checked id="male-red-checkbox" name="gender" type="radio" value="male" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="male-red-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homme</label>
                    </div>
                    <div class="">
                        <input id="female-green-checkbox" name="gender" type="radio" value="female" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="female-green-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Femme</label>
                    </div>
                    <div class="">
                        <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sexe *</label>
                    </div>
                    
                </div>

                <div class="flex items-center justify-end mt-4">            
                    <x-primary-button class="ms-4">
                        {{ __('Inscription') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div> 