@props(['active' => false])

<div {{$attributes}}

@class([
    'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mx-20', $active
])
class="">{{$slot}}</div>
