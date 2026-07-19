@php
    $currentLocale = app()->getLocale();
    $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
    $routeParams = request()->route() ? request()->route()->parameters() : [];

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
<div class="ml-1 flex items-center gap-1 border-l border-white/20 pl-3 text-xs font-semibold">
    <a href="{{ $trUrl }}" class="rounded px-2 py-1 {{ $currentLocale === 'tr' ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white' }}">TR</a>
    <a href="{{ $bsUrl }}" class="rounded px-2 py-1 {{ $currentLocale === 'bs' ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white' }}">BS</a>
</div>
