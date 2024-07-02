<x-try-layout>
    {{-- Hero Section --}}
    <header class="bg-center bg-no-repeat h-full w-full bg-backgroundImg bg-gray-400 bg-blend-multiply" style="background-image: url('/assets/hospital-software-reseller-program.jpg');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{__('Pas d\'investissement, opportunité d\'affaire à haute profit') }}</h1>
            <p class="mb-8 text-lg font-normal uppercase text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Nos Offres.
            </p>
        </div>
    </header>
    {{-- End Hero Section --}}
    {{-- Section --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 place-content-stretch text-gray-50 xl:mx-20 mx-4 my-14">
        <div class="xl:relative flex flex-col h-full p-4 bg-red-400">
            <div class="flex-1">
                <h2 class="block text-2xl uppercase font-black sm:text-xl md:text-xl">Découvrez une plus grande valeur pour vos clients et nouez des relations enrichissantes</h2>
                <p class="text-gray-100 tracking-widest text-left italic mt-10">
                    Développez vos opportunités ! Le programme de revendeur de logiciels hospitaliers en marque blanche est le bon allié pour ceux qui travaillent avec du marketing d'entreprise, des revendeurs de logiciels ou toute autre forme de contact avec des hôpitaux, des cliniques, des centres de santé et qui souhaitent augmenter leurs revenus et gagner plus de clients.
                </p>
            </div>
        
            <div class="xl:absolute bottom-4">
                <x-primary-button class="">
                    {{__('Devenir Partenaire')}}
                </x-primary-button>
            </div>
        </div>
        
        <div class="p-4 bg-gray-400 rounded text-center">
            <div class="grid xl:grid-cols-3 gap-0">
                <div class="">
                    <img src="{{asset('assets/best-software-reseller-program.jpg')}}" alt="">
                </div>
                <div class="bg-yellow-400">

                </div>
                <div class="bg-black"></div>
                <div class="bg-white"></div>
                <div class="">
                    <img src="{{asset('assets/software-partner-program.jpg')}}" alt="">
                </div>
                <div class="bg-red-900"></div>
                <div class="bg-violet-400"></div>
                <div class="bg-green-400">
                </div>
                <div class="">
                    <img src="{{asset('assets/healthcare-software-reseller-program.jpg')}}" alt="">

                </div>
            </div>
        </div>        
    </div>
    {{-- End Section --}}
    <section class="grid xl:grid-cols-2 xl:mx-20 gap-4">    
        <div class="h-full p-4 bg-red-400">
            <span class="block text-xl font-bold text-gray-200">Plus d'affaires</span>
            <p class="text-gray-50 tracking-widest text-left italic">
                Développez vos opportunités ! Le programme de revendeur de logiciels hospitaliers en marque blanche est le bon allié pour ceux qui travaillent avec du marketing d'entreprise, des revendeurs de logiciels ou toute autre forme de contact avec des hôpitaux, des cliniques, des centres de santé et qui souhaitent augmenter leurs revenus et gagner plus de clients.
            </p>
        </div>
        <div class="h-full p-4 bg-red-400">
            <span class="block text-xl font-bold text-gray-200">Liberté de tarification</span>
            <p class="text-gray-50 tracking-widest text-left italic">
                Alors que d’autres programmes parlent de taux de commission, le nôtre se démarque du lot. Ici, vous pouvez définir votre propre prix. C'est vrai, vous choisissez combien d'argent vous gagnez avec chaque produit. Ça fait du bien d'avoir ce pouvoir, non ?
            </p>
        </div>
        <div class="h-full p-4 bg-red-400">
            <span class="block text-xl font-bold text-gray-200">Gamme de produits en expansion</span>
            <p class="text-gray-50 tracking-widest text-left italic">
                Nous lançons constamment de nouveaux produits pour vous aider à offrir plus de valeur à vos clients
            </p>
        </div>
        <div class="h-full p-4 bg-red-400">
            <span class="block text-xl font-bold text-gray-200">Tirer parti de la migration de valeur</span>
            <p class="text-gray-50 tracking-widest text-left italic">
                Éloignez-vous de la vente d'outils encombrants et gardez une longueur d'avance avec les meilleurs produits prêts à l'emploi, faciles à déployer, dotés d'une interface utilisateur riche et offrant une grande valeur à tout type d'entreprise.
            </p>
        </div>
    </section>
</x-try-layout>