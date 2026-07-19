@php
    $onDark = $onDark ?? false;
    $class = $class ?? '';
    $logoPath = $onDark ? 'images/uid-logo1.png' : 'images/uid-logo.png';
@endphp

<a href="{{ t_route('home') }}" class="inline-flex items-center gap-2 {{ $class }}">
    <img
        src="{{ asset($logoPath) }}"
        alt="UID"
        class="h-10 w-auto shrink-0 object-contain md:h-12"
    >
</a>
