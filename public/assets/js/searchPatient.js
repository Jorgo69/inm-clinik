// $(document).ready(function() {
//     $('#search').on('keyup', function() {
//         var query = $(this).val();

//         if (query.length > 0) {
//             $.ajax({
//                 url: '/search-users',
//                 type: 'GET',
//                 data: { query: query },
//                 success: function(data) {
//                     $('#results').empty();
//                     if (data.length > 0) {
//                         $.each(data, function(index, user) {
//                             $('#results').append('<li class="py-2 px-4 border-b border-gray-200">' + user.name + '</li>');
//                         });
//                     } else {
//                         $('#results').append('<li class="py-2 px-4">No results found</li>');
//                     }
//                 }
//             });
//         } else {
//             $('#results').empty();
//         }
//     });
// });


$(document).ready(function() {
    $('#search').on('keyup', function() {
        var query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: '{{ route("member.secretary.serch.patient") }}',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#results').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, user) {
                            $('#results').append('<li class="py-2 px-4 border-b border-gray-200">' + user.name + '</li>');
                        });
                    } else {
                        $('#results').append('<li class="py-2 px-4">No results found</li>');
                    }
                }
            });
        } else {
            $('#results').empty();
        }
    });
});