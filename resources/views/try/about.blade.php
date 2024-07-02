<x-try-layout>
    {{-- Hero Section --}}
    <header class="bg-center bg-no-repeat h-full w-full bg-blend-multiply" style="background-image: url('/assets/about-banner.jpg');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">La bonne solution pour votre clinique</h1>
            <p class="mb-8 text-lg font-normal uppercase text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                A propos de nous.
            </p>
        </div>
    </header>
    {{-- End Hero Section --}}
    
    <section class="mx-4 my-8 bg-white dark:bg-gray-900">
            <x-grid-tree-reponsive active="gap-x-0">
                <div class="">
                    <img src="{{asset('assets/company-profile.jpg')}}" alt="">
                </div>
                <div class="bg-blue-600 xl:text-center xl:px-10 text-lg">
                    <span class="block text-white font-bold mb-10 p-4">Caractéristiques de Soft Care.</span>
                    <span class="block text-gray-300 ">Soft Care regroupe les modules les plus puissants dans un seul logiciel pour augmenter l'efficacité de votre hôpital, réduire les coûts, économiser des ressources et du temps. Notre solution offre toutes les fonctionnalités nécessaires à l’automatisation des flux organisationnels, améliorant ainsi la qualité des soins et la gestion de votre établissement médical.</span>

                </div>
                <div class="xl:ml-8 bg-gray-100 sm:bg-red-500">
                    <img src="{{asset('assets/about-us.jpg')}}" alt="" class="max-w-full">
                    <div class="px-4">
                        <span class="block text-center">Qui sommes nous</span>
                        <span class="flex flex-col space-x-8">
                            Nous sommes une entreprise avec une culture et des codes d'éthique. Nos valeurs sont ce qui nous unit, mais nos différences sont ce qui nous inspire. Nous nous efforçons de faire de notre mieux et de célébrer nos succès à chaque occasion.
                        </span>
                    </div>
                </div>
            </x-grid-tree-reponsive>
    </section>

    <section class="mx-4 my-8 p-8 bg-gray-50 dark:bg-gray-900">
        <div class="text-center">
            <h6 class="text-lg text-gray-300 capitalize">Un choix qui fait la difference</h6>
            <h4 class="font-bold text-4xl">Raison de nous choisir</h4>
        </div>
        
        <div class="grid sm:grid-cols-4 gap-2 xl:mx-20">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <svg class="size-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                  </svg>
                  
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion des Patients Externes (OPD)</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Enregistrement et Suivi des Patients:</span>
                    <span class="block">Centralisez les informations des patients, gérez les visites et les révisions, ajoutez des diagnostics et créez des prescriptions.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Gestion des patients:</span>
                    <span class="block">acturez les traitements et gérez les paiements facilement..</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <svg class="size-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                  </svg>
                  
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion des Patients Hospitalisés (IPD)</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Admission et Suivi des Patients:</span>
                    <span class="block">Gérez l’admission des patients, l’attribution des lits, les instructions médicales, les diagnostics et les prescriptions.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Gestion des frais:</span>
                    <span class="block">Ajoutez des frais de traitement, gérez les factures et les paiements</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Dossiers Médicaux Électroniques (DME)</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Accès Instantané aux Données:</span>
                    <span class="block">Accédez rapidement aux dossiers médicaux électroniques des patients pour une prise de décision éclairée.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Partage Sécurisé des Informations :</span>
                    <span class="block">Facilitez la collaboration entre les professionnels de santé avec des dossiers partagés et sécurisés.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Télémédecine</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Consultations Vidéo:</span>
                    <span class="block">Offrez des consultations à distance via des appels vidéo sécurisés, permettant aux patients de recevoir des soins sans se déplacer.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Ordonnances Électroniques:</span>
                    <span class="block">Fournissez des prescriptions électroniques directement via la plateforme.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion de la Salle d'Opération</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Planification des Interventions:</span>
                    <span class="block">Gérez les patients, ajoutez des détails sur les opérations et suivez les frais associés.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Coordination des Ressources:</span>
                    <span class="block">Planifiez et suivez l’utilisation des salles d’opération et du personnel médical.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion de la pharmacie</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Suivi de stock Vidéo:</span>
                    <span class="block">Gérez les stocks de médicaments, générez des factures, et maintenez un registre complet des médicaments vendus.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Achats et Facturation:</span>
                    <span class="block">Facilitez l’achat de médicaments et la gestion des factures.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Systeme de gestion de laboratoire</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Gestoin des tests:</span>
                    <span class="block">Enregistrez et gérez les tests de pathologie et de radiologie, générez des rapports de test et suivez les frais.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Rapports et access patients:</span>
                    <span class="block">Les patients peuvent consulter leurs rapports de test via le portail patient.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Portail du Médecin</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Gestion des Rendez-vous:</span>
                    <span class="block">Gérez votre emploi du temps et vos rendez-vous depuis n'importe où et sur n'importe quel appareil.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Consultations à Distance:</span>
                    <span class="block">Servez les patients par appel vidéo, affichez leur historique de traitement et bien plus encore.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Portail Patients</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Prise de Rendez-vous:</span>
                    <span class="block">Les patients peuvent prendre rendez-vous avec leurs spécialistes et effectuer des paiements en ligne.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Accès aux Informations Médicales:</span>
                    <span class="block">Consultez l'historique des traitements, des prescriptions et des rapports de test.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion financiere et facturation</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Facturation Automatisée:</span>
                    <span class="block">Simplifiez la facturation avec des outils automatisés, gérant les paiements, les remboursements et les rapports financiers</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Suivi des patients:</span>
                    <span class="block">Gardez une trace des paiements en temps réel pour une gestion financière efficace.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Gestion des Ressources Humaines et de la Paie</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Gestion du personnel:</span>
                    <span class="block">Ajoutez et gérez le personnel avec tous les détails importants, générez des paies et suivez la présence.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Rapports et statiques:</span>
                    <span class="block">Contrôlez les performances de votre personnel avec des rapports détaillés.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Sécurité et Conformité</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Protection des donnés:</span>
                    <span class="block">Assurez la confidentialité et la sécurité des données de vos patients avec des protocoles de sécurité avancés.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Contrôle des accèss:</span>
                    <span class="block">Gérez les droits d’accès des utilisateurs pour garantir que seules les personnes autorisées peuvent accéder aux informations sensibles.</span>
                </p>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transform hover:-translate-y-1 transition duration-300 ease-in-out">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Accessibilité et Flexibilité</h5>
                </a>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">100% Web:</span>
                    <span class="block">Accédez à Soft Care à tout moment et de n’importe où, sur n’importe quel appareil connecté à Internet.</span>
                </p>
                <p class="mb-3 block font-normal text-gray-500 dark:text-gray-400">
                    <span class="underline">Interface intuitive:</span>
                    <span class="block">Bénéficiez d’une interface utilisateur simple et intuitive, facilitant l’adoption par le personnel.</span>
                </p>
            </div>
        </div>
    </section>
    

    <section class="mx-20">
        <div class="grid grid-cols-2 center">
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Télémédecine</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>    
            </div>
            <div class="">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>    
            </div>
        </div>
    </section>

</x-try-layout>