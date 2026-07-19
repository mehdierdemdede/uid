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
    $baClipId = 'ba-flag-clip-'.uniqid();
@endphp
<div class="ml-1 flex items-center gap-2 border-l border-white/20 pl-3" role="group" aria-label="{{ __('Dil seçimi') }}">
    <a
        href="{{ $trUrl }}"
        class="flex h-6 w-8 items-center justify-center overflow-hidden rounded transition {{ $currentLocale === 'tr' ? 'ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Türkçe"
        aria-label="Türkçe"
        aria-current="{{ $currentLocale === 'tr' ? 'true' : 'false' }}"
    >
        <svg class="h-full w-full" viewBox="0 0 640 480" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <g fill-rule="evenodd">
                <path fill="#e30a17" d="M0 0h640v480H0z"/>
                <path fill="#fff" d="M407 247.5c0 66.2-54.6 119.9-122 119.9s-122-53.7-122-120 54.6-119.8 122-119.8 122 53.7 122 119.9"/>
                <path fill="#e30a17" d="M413 247.5c0 53-43.6 95.9-97.5 95.9s-97.6-43-97.6-96 43.7-95.8 97.6-95.8 97.6 42.9 97.6 95.9z"/>
                <path fill="#fff" d="m430.7 191.5-1 44.3-41.3 11.2 40.8 14.5-1 40.7 26.5-31.8 40.2 14-23.2-34.1 28.3-33.9-43.5 12-25.8-37z"/>
            </g>
        </svg>
    </a>
    <a
        href="{{ $bsUrl }}"
        class="flex h-6 w-8 items-center justify-center overflow-hidden rounded transition {{ $currentLocale === 'bs' ? 'ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Bosanski"
        aria-label="Bosanski"
        aria-current="{{ $currentLocale === 'bs' ? 'true' : 'false' }}"
    >
        <svg class="h-full w-full" viewBox="0 0 640 480" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <clipPath id="{{ $baClipId }}">
                    <path fill-opacity="0.7" d="M-85.3 0h682.6v512H-85.3z"/>
                </clipPath>
            </defs>
            <g fill-rule="evenodd" clip-path="url(#{{ $baClipId }})" transform="translate(80)scale(.9375)">
                <path fill="#009" d="M-85.3 0h682.6v512H-85.3z"/>
                <path fill="#FC0" d="m56.5 0 511 512.3V.3z"/>
                <path fill="#FFF" d="M439.9 481.5 412 461.2l-28.6 20.2 10.8-33.2-28.2-20.5h35l10.8-33.2 10.7 33.3h35l-28 20.7zm81.3 10.4-35-.1-10.7-33.3-10.8 33.2h-35l28.2 20.5-10.8 33.2 28.6-20.2 28 20.3-10.5-33zM365.6 384.7l28-20.7-35-.1-10.7-33.2-10.8 33.2-35-.1 28.2 20.5-10.8 33.3 28.6-20.3 28 20.4zm-64.3-64.5 28-20.6-35-.1-10.7-33.3-10.9 33.2h-34.9l28.2 20.5-10.8 33.2 28.6-20.2 27.9 20.3zm-63.7-63.6 28-20.7h-35L220 202.5l-10.8 33.2h-35l28.2 20.4-10.8 33.3 28.6-20.3 28 20.4-10.5-33zm-64.4-64.3 28-20.6-35-.1-10.7-33.3-10.9 33.2h-34.9L138 192l-10.8 33.2 28.6-20.2 27.9 20.3-10.4-33zm-63.6-63.9 27.9-20.7h-35L91.9 74.3 81 107.6H46L74.4 128l-10.9 33.2L92.1 141l27.8 20.4zm-64-64 27.9-20.7h-35L27.9 10.3 17 43.6h-35L10.4 64l-11 33.3L28.1 77l27.8 20.4zm-64-64L9.4-20.3h-35l-10.7-33.3L-47-20.4h-35L-53.7 0l-10.8 33.2L-35.9 13l27.8 20.4z"/>
            </g>
        </svg>
    </a>
</div>
