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
<div class="relative ml-1 border-l border-white/20 pl-3" x-data="{ langOpen: false }" @click.outside="langOpen = false">
    <button
        type="button"
        @click="langOpen = !langOpen"
        class="flex items-center gap-1.5 rounded px-2 py-1.5 text-sm font-medium text-white/90 hover:bg-white/10"
        :aria-expanded="langOpen"
        aria-haspopup="true"
        aria-label="{{ __('Dil seçimi') }}"
    >
        <span class="text-base leading-none" aria-hidden="true">{{ $currentLocale === 'bs' ? '🇧🇦' : '🇹🇷' }}</span>
        <span>{{ strtoupper($currentLocale) }}</span>
        <svg class="h-3 w-3 transition" :class="langOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div
        x-cloak
        x-show="langOpen"
        x-transition
        class="absolute right-0 z-50 mt-2 w-40 overflow-hidden rounded-lg border border-slate-200 bg-white py-1 text-slate-800 shadow-lg"
    >
        <a href="{{ $trUrl }}" class="flex items-center gap-2 px-3 py-2 text-sm hover:bg-slate-50 {{ $currentLocale === 'tr' ? 'font-semibold text-uid-navy' : '' }}">
            <span aria-hidden="true">🇹🇷</span> Türkçe
        </a>
        <a href="{{ $bsUrl }}" class="flex items-center gap-2 px-3 py-2 text-sm hover:bg-slate-50 {{ $currentLocale === 'bs' ? 'font-semibold text-uid-navy' : '' }}">
            <span aria-hidden="true">🇧🇦</span> Bosanski
        </a>
    </div>
</div>
