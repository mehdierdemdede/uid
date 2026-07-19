@php
    $currentLocale = app()->getLocale();
    $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
    $routeParams = [];
    if ($route = request()->route()) {
        foreach ($route->parameterNames() as $paramName) {
            $routeParams[$paramName] = $route->parameter($paramName);
        }
    }

    if ($currentLocale === 'bs') {
        $trName = \Illuminate\Support\Str::after($currentRouteName, 'bs.');
        $bsName = $currentRouteName;
    } else {
        $trName = $currentRouteName;
        $bsName = 'bs.'.$currentRouteName;
    }

    $trUrl = \Illuminate\Support\Facades\Route::has($trName) ? route($trName, $routeParams) : url('/');
    $bsUrl = \Illuminate\Support\Facades\Route::has($bsName) ? route($bsName, $routeParams) : url('/bs');
@endphp
<div class="ml-1 flex items-center gap-2 border-l border-white/20 pl-3" role="group" aria-label="{{ __('Dil seçimi') }}">
    <a
        href="{{ $trUrl }}"
        class="flex h-6 w-8 items-center justify-center overflow-hidden rounded transition {{ $currentLocale === 'tr' ? 'ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Türkçe"
        aria-label="Türkçe"
        aria-current="{{ $currentLocale === 'tr' ? 'true' : 'false' }}"
    >
        <svg viewBox="0 0 30 20" class="h-full w-full" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect width="30" height="20" fill="#E30A17"/>
            <circle cx="11" cy="10" r="6" fill="#fff"/>
            <circle cx="13" cy="10" r="4.8" fill="#E30A17"/>
            <polygon fill="#fff" points="19,6.8 19.76,8.95 22.04,9.01 20.24,10.40 20.88,12.59 19,11.3 17.12,12.59 17.76,10.40 15.96,8.99 18.24,8.95"/>
        </svg>
    </a>
    <a
        href="{{ $bsUrl }}"
        class="flex h-6 w-8 items-center justify-center overflow-hidden rounded transition {{ $currentLocale === 'bs' ? 'ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Bosanski"
        aria-label="Bosanski"
        aria-current="{{ $currentLocale === 'bs' ? 'true' : 'false' }}"
    >
        <svg viewBox="0 0 30 20" class="h-full w-full" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect width="30" height="20" fill="#002395"/>
            <polygon points="0,0 30,0 0,20" fill="#FECB00"/>
            <g fill="#fff">
                <circle cx="6" cy="3" r="1"/>
                <circle cx="11" cy="6.5" r="1"/>
                <circle cx="16" cy="10" r="1"/>
                <circle cx="21" cy="13.5" r="1"/>
                <circle cx="26" cy="17" r="1"/>
            </g>
        </svg>
    </a>
</div>
