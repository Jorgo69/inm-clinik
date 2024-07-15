<div role="alert" id="alert-error" class="bg-red-100 max-w-md mx-auto dark:bg-red-900 border-l-4 border-red-500 dark:border-red-700 text-red-500 dark:text-red-100 p-2 rounded-lg flex items-center transition duration-300 ease-in-out hover:bg-red-200 dark:hover:bg-red-800 transform hover:scale-105">
    <svg stroke="currentColor"   viewBox="0 0 24 24"   fill="none"   class="h-5 w-5 flex-shrink-0 mr-2 text-red-600"   xmlns="http://www.w3.org/2000/svg">
    <path d="M13 16h-1v-4h1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"     stroke-width="2"     stroke-linejoin="round"     stroke-linecap="round">
    </path>
    </svg>
    <p class="text-xs font-semibold">
        Error - {!! Session::get('error') !!}
    </p>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5  text-red-900 rounded-lg focus:ring-2 focus:ring-red-500 p-1.5  inline-flex items-center justify-center h-8 w-8 dark:bg-red-500 dark:text-red-500 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>