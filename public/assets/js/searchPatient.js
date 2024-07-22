$(document).ready(function(){
    fetch_patient_data();

    function fetch_patient_data(query = '')
    {
        $.ajax({
            url: "{{route('member.secretary.serch.patient')}}",
            method: 'GET',
            data:{query:query},
            dataType: 'json',
            success: function (data) 
            {
                $('#resultats').empty();
                if (data.length > 0) {
                    $.each(data, function(index, users) {
                        console.log(users);
                        $('#resultats').append(`
                            <tr>
                                <td class="px-4 data_table py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <img class="object-cover size-10 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt=""> --}}
                                        <p class="size-12 uppercase text-center flex items-center justify-center text-xl tracking-tighter font-bold bg-gray-200 hover:ring-blue-500 animate rounded-full dark:bg-white ring-4 ring-gray-300 dark:ring-white shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40">
                                            {{
                                                Str::substr($patient->name, 0, 1).
                                                Str::substr($patient->firstname, 0, 1)
                                            }}
                                        </p>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white ">${users.name +' '+ users.firstname}</h2>
                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">${users.email}</p>
                                    </div>
                                </td>
                                
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        Patients
                                    </div>
                                </td>
                                

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                                        
                                        <x-nav-link href="{{route('member.patient.show.detail', ['clinic_id' => $clinic->id, 'patient_id'=> $patient->id])}}" class="font-medium mx-4 text-gray-500 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            Details
                                        </x-nav-link>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    // console.log(data);
                    $('#resultats').append(`
                        <tr>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="object-cover size-10 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80" alt="">
                                </div>
                            </td>

                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div>
                                    <h2 class="font-medium text-gray-800 dark:text-white ">Aucun Resultats</h2>
                                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">catalogapp.io</p>
                                </div>
                            </td>
                            
                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                    Patients
                                </div>
                            </td>
                            

                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                                    
                                    <x-nav-link class="font-medium mx-4 text-gray-500 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        Details
                                    </x-nav-link>
                                </div>
                            </td>
                        </tr>
                    `);
                }
                // $('#to')
            }
        })
    }

    $(document).on('keyup', '#recherche', function(){
        var query = $(this).val();
        fetch_patient_data(query);
    });
})