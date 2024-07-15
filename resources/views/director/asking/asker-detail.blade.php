<x-app-layout>
    <div class="p-4 sm:ml-64">
        <x-aside class="">
            <section class="bg-white dark:bg-gray-900">
                <div class="max-w-6xl px-6 py-10 mx-auto">
                    <p class="text-xl font-medium text-blue-500 ">A propos de {{ $asker->askers->name }}</p>

                    {{-- <h1 class="mt-2 text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
                        What clients saying
                    </h1> --}}
                @if (session('success'))
                    @include('alerts.alert-success')                    
                @endif

                    <main class="relative z-20 w-full mt-8 md:flex md:items-center xl:mt-12">
                        <div class="absolute w-full bg-blue-600 -z-10 md:h-96 rounded-2xl"></div>
                        
                        <div class="w-full p-6 bg-blue-600 md:flex md:items-center rounded-2xl md:bg-transparent md:p-0 lg:px-12 md:justify-evenly">
                            <img class="h-24 w-24 md:mx-6 rounded-full object-cover shadow-md md:h-[32rem] md:w-80 lg:h-[36rem] lg:w-[26rem] md:rounded-2xl" src="https://images.unsplash.com/photo-1488508872907-592763824245?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="client photo" />
                            
                            <div class="mt-2 md:mx-6">
                                <div>
                                    <p class="text-xl font-medium tracking-tight text-white">
                                        {{ $asker->askers->name .' '. $asker->askers->firstname }}
                                    </p>
                                    <p class="text-blue-200 ">Travaille</p>
                                </div>

                                <p class="mt-4 text-lg leading-relaxed text-white md:text-xl">
                                     “Veux devenir membre de la clinique {{ $asker->clinics->clinic_name }}”.
                                    </p>
                                
                                <div class="flex items-center justify-between mt-6 md:justify-start">
                                    <button title="Annuler" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 hover:bg-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                          </svg>                                          
                                    </button>

                                <form action="{{route('director.asker.validator', ['asking_id' => $asker->id])}}" method="post">
                                        @csrf
                                        @method('put')
                                    @if ($asker->statut === 'waiting')
                                    <button title="Valider" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 md:mx-6 hover:bg-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                          </svg>
                                    </button>
                                    @endif
                                </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </section>
        </x-aside>
    </div>
</x-app-layout>