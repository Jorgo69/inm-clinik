<x-try-layout>
    {{-- Hero Section --}}
    <header class="bg-center bg-no-repeat h-full w-full bg-backgroundImg bg-gray-400 bg-blend-multiply" style="background-image: url('/assets/contact-banner.jpg');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{__('Nous serions ravis d\'avoir de vos nouvelles') }}</h1>
            <p class="mb-8 text-lg font-normal uppercase text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Conatctez nous.
            </p>
        </div>
    </header>
    {{-- End Hero Section --}}

    <section class="xl:mx-20  mx-8 mt-8">
        <div class="grid xl:grid-cols-2 grid-col  xl:gap-4">
            <div class="">
                <p class="block">
                    Si vous souhaitez des informations sur l'une de nos solutions ou êtes intéressé à collaborer avec nous, remplissez notre formulaire et nous vous contacterons dans les plus brefs délais.
                </p>
                <span class="block font-bold xl:text-xl capitalize">
                    ENVOYEZ-NOUS UN EMAIL
                </span>
                <span class="block">

                </span>
                <span class="block">

                </span>
                <span class="block font-bold xl:text-xl capitalize">
                    Contact rapide
                </span>
                <span class="block">
                    Tel:
                </span>
                <span class="block font-bold xl:text-xl capitalize">
                    Whatsapp
                </span>

            </div>
            <div class="">
                <p class="block">
                    Envoyez-nous un message et nos experts vous contacteront.
                </p>
                <form action="">
                    <div class="my-2">
                        <x-text-input placeholder="Nom *" class="w-full" required/>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                    </div>
                    <div class="my-2">
                        <x-text-input placeholder="Email *" class="w-full"/>
                    </div>
                    <div class="my-2">
                        <x-text-input placeholder="Telephone " class="w-full"/>
                    </div>
                    <div class="">
                        <textarea rows="2" class="block p-2.5 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            Votre message...
                        </textarea>
                    </div>
                    <div class="my-4">
                        <x-primary-button>Envoyer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-try-layout>