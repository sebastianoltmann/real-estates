@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'font-weight-bolder dropdown-item px-4'
                : 'dropdown-item px-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
