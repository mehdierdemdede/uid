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
<div class="ml-1 flex items-center gap-1.5 border-l border-white/20 pl-3" role="group" aria-label="{{ __('Dil seçimi') }}">
    <a
        href="{{ $trUrl }}"
        class="flex h-8 w-8 items-center justify-center rounded-full text-lg leading-none transition {{ $currentLocale === 'tr' ? 'bg-white/20 ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Türkçe"
        aria-label="Türkçe"
        aria-current="{{ $currentLocale === 'tr' ? 'true' : 'false' }}"
    >🇹🇷</a>
    <a
        href="{{ $bsUrl }}"
        class="flex h-8 w-8 items-center justify-center rounded-full text-lg leading-none transition {{ $currentLocale === 'bs' ? 'bg-white/20 ring-2 ring-white' : 'opacity-60 hover:opacity-100' }}"
        title="Bosanski"
        aria-label="Bosanski"
        aria-current="{{ $currentLocale === 'bs' ? 'true' : 'false' }}"
    >🇧🇦</a>
</div>
