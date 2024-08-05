<div id="{{$patient->id}}" numero tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ajouter un RDV pour {{$patient->name .' '. $patient->firstname}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{$patient->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{route('member.patient.take.appointment', ['clinic_id' => $clinicId, 'patient_id' => $patient->id])}}" method="POST">
                @csrf
                @method('POST')
                <div class="grid gap-4 mb-4 grid-cols-2">
                  <div class="col-span-2 sm:col-span-1">
                      <label for="__{{$patient->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                      <input type="date" name="date" id="__{{$patient->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                      @error('date')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="col-span-2 sm:col-span-1">
                      <label for="__{{$patient->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                      <input type="time" name="time" id="__{{$patient->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" min="{{ \Carbon\Carbon::now()->format('i-s') }}">
                      @error('time')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="col-span-2">
                      <label for="__{{$patient->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                      <textarea name="reason" id="__{{$patient->id}}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Les Maux enumeres par la patient"></textarea>
                      @error('reason')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Ajouter RDV
                  </button>
            </form>
        </div>
    </div>
</div>