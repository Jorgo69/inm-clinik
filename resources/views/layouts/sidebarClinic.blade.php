<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
           <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-svg-medical-home />
                <span class="ms-3">Accueil</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <x-svg-ambulance-emergency />
                   <span class="flex-1 ms-3 whitespace-nowrap">Urgence</span>
                </a>
            </li>
            <li>
                <a href="{{route('member.consultation.index', ['clinic_id' => $clinic->id])}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <x-svg-consultation />
                   <span class="flex-1 ms-3 whitespace-nowrap">Consultation</span>
                </a>
            </li>
            {{-- Patient - Sous - Menu --}}
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
                        <a href="{{route('member.patient.index', ['clinic_id' => $clinic->id])}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Liste des Patients
                    </a>
                    </li>
                </ul>
            </li>

            {{-- Secretaire - Sous - Menu --}}
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-secretaire-submenu" data-collapse-toggle="dropdown-secretaire-submenu">
                    <x-svg-hospital-secretary />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Secretaire</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-secretaire-submenu" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Ajouter RDV
                    </a>
                    </li>
                    <li>
                        <a href="{{route('member.secretary.index', ['clinic_id' => $clinic->id])}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Liste des RDV
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
            <a href="{{route('member.doctor.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
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

            {{-- Menu - Submenu - Director - A traver l'Id --}}
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-personals-submenu" data-collapse-toggle="dropdown-personals-submenu">
                    <x-svg-personnals />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Personnels</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-personals-submenu" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('member.personal.index', ['clinic_id' => $clinic->id])}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-people-group />
                            <span class="mx-2">Le personnel</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-stethoscope-doctor />
                            <span class="mx-2">Docteur</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-nurse-docteur />
                            <span class="mx-2">Infirmier</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-caregiver />
                            <span class="mx-2">Aide soignant</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-cashier-machine-profile />
                            <span class="mx-2">Caissier</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-pharmacy-symbole />
                            <span class="mx-2">Pharmaciens</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-svg-hospital-secretary />
                            <span class="mx-2">Secretaire</span>
                        </a>
                    </li>
                </ul>
            </li>
           </ul>
        </div>
    
    
</aside>