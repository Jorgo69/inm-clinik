<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
           <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <x-svg-ambulance-emergency />
                   <span class="flex-1 ms-3 whitespace-nowrap">Urgence</span>
                </a>
            </li>
            <li>
                <a href="{{route('member.consultation.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <x-svg-consultation />
                   <span class="flex-1 ms-3 whitespace-nowrap">Consultation</span>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-svg-medical-home />
                <span class="ms-3">Accueil</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-patient-submenu" data-collapse-toggle="dropdown-patient-submenu">
                    <x-svg-patient-bandage />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Patients</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-patient-submenu" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Ajouter Patients
                    </a>
                    </li>
                    <li>
                        <a href="{{route('member.patient.index')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Liste des Patients
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-svg-service />
                <span class="flex-1 ms-3 whitespace-nowrap">Services</span>
                </a>
            </li>
            <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-svg-nurse-docteur />
                <span class="flex-1 ms-3 whitespace-nowrap">Docteur</span>
            </a>
            </li>
            <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-svg-pharmacy-symbole />
                <span class="flex-1 ms-3 whitespace-nowrap">Pharmacies</span>
            </a>
            </li>
           </ul>
        </div>
    
    
</aside>