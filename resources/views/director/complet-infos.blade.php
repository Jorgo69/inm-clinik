<x-app-layout>
    
    <div class="pt-10 sm:ml-64">          
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (Session::has('success'))
            <div class="space-y-2 p-4">
                @include('alerts.alert-success')
            @elseif (Session::has('error'))
                @include('alerts.alert-error')
            </div>
            @endif

            <form class="max-w-md mx-auto" action="{{route('director.asking.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="relative z-0 w-full mb-5 group active">
                            <x-input-label for="complet_name" :value="__('Nom complet *')" />
                            <x-text-input id="complet_name" class="block mt-1 w-full" type="text" name="complet_name" value="{{auth()->user()->name. ' '. auth()->user()->firstname}}"  />
                            <x-input-error :messages="$errors->get('complet_name')" class="mt-2" />
                        </div>
                        <div class="relative z-0 w-full mb-5 group active">
                            <x-input-label for="matricule" :value="__('Matricule *')" />
                            <x-text-input id="matricule" class="block mt-1 w-full" type="text" name="matricule"  />
                            <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
                        </div>
                        <div class="relative z-0 w-full mb-5 group active">
                            <x-input-label for="adresse" :value="__('Votre adresse *')" />
                            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse"  />
                            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                        </div>
                        {{-- <div class="relative z-0 w-full mb-5 group active">
                            <x-input-label for="unique_number" :value="__('Numero d\'identification unique')" />
                            <x-text-input id="unique_number" class="block mt-1 w-full" type="text" name="unique_number"  />
                            <x-input-error :messages="$errors->get('unique_number')" class="mt-2" />
                        </div> --}}
                        <div class="relative z-0 w-full mb-5 group active">
                            <x-input-label for="files" :value="__('Televerser vos fichier')" />
                            <input type="file" name="files[]" multiple class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 "/>
                            {{-- <x-text-input id="files" class="block mt-1 w-full" type="file" name="files[]" multiple/> --}}
                            <x-input-error :messages="$errors->get('files[]')" class="mt-2" />
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label for="number" :value="__('Televerser vos fichier')" />
                                <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('name')"  />
                                <x-input-error :messages="$errors->get('number')" class="mt-2" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-label for="mail" :value="__('Email valide')" />
                                <x-text-input id="mail" class="block mt-1 w-full" type="email" name="email" value="{{auth()->user()->email}}"  />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <x-primary-button>
                            Soumettre
                        </x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>