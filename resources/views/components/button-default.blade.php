@props(['active' => false])

<a {{$attributes}}

@class([
    'text-blue-700 hover:text-white border rounded-lg text-sm px-5 py-2.5 text-center', $active
])
class="">{{$slot}}</a>
