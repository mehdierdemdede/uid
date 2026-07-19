<header class="sticky top-0 z-50 border-b border-white/10 bg-uid-deep shadow-lg" x-data="{ mobileOpen: false }">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 md:px-6 lg:px-8">
        @include('site.partials.logo', ['onDark' => true])

        <nav class="hidden items-center gap-1 md:flex md:gap-0 lg:gap-1" aria-label="Ana menü">
            <a href="{{ t_route('home') }}" class="rounded px-3 py-2 text-sm font-medium text-white/90 hover:bg-white/10 hover:text-white {{ request()->routeIs('home', 'bs.home') ? 'bg-white/10 text-white' : '' }}">{{ __('Ana Sayfa') }}</a>
            <a href="{{ t_route('about') }}" class="rounded px-3 py-2 text-sm font-medium text-white/90 hover:bg-white/10 hover:text-white {{ request()->routeIs('about', 'bs.about') ? 'bg-white/10 text-white' : '' }}">{{ __('Hakkımızda') }}</a>
            <a href="{{ t_route('news.index') }}" class="rounded px-3 py-2 text-sm font-medium text-white/90 hover:bg-white/10 hover:text-white {{ request()->routeIs('news.index', 'bs.news.index') ? 'bg-white/10 text-white' : '' }}">{{ __('Haberler') }}</a>
            <a href="{{ t_route('membership.create') }}" class="rounded px-3 py-2 text-sm font-medium text-uid-teal hover:text-white">{{ __('Üye ol') }}</a>
            <a href="{{ t_route('contact') }}" class="rounded px-3 py-2 text-sm font-medium text-white/90 hover:bg-white/10 hover:text-white {{ request()->routeIs('contact', 'bs.contact') ? 'bg-white/10 text-white' : '' }}">{{ __('İletişim') }}</a>
            @include('site.partials.language-switcher')
        </nav>

        <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 md:hidden" @click="mobileOpen = !mobileOpen" :aria-expanded="mobileOpen" aria-controls="site-mobile-nav" aria-label="Menüyü aç/kapat">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak x-show="mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <div id="site-mobile-nav" class="border-t border-white/10 bg-uid-deep md:hidden" x-cloak x-show="mobileOpen" x-transition>
        <nav class="flex flex-col px-4 py-3" aria-label="Mobil menü">
            <a href="{{ t_route('home') }}" class="rounded px-3 py-2 text-sm text-white/90 hover:bg-white/10">{{ __('Ana Sayfa') }}</a>
            <a href="{{ t_route('about') }}" class="rounded px-3 py-2 text-sm text-white/90 hover:bg-white/10">{{ __('Hakkımızda') }}</a>
            <a href="{{ t_route('news.index') }}" class="rounded px-3 py-2 text-sm text-white/90 hover:bg-white/10">{{ __('Haberler') }}</a>
            <a href="{{ t_route('membership.create') }}" class="rounded px-3 py-2 text-sm font-medium text-uid-teal hover:bg-white/10">{{ __('Üye ol') }}</a>
            <a href="{{ t_route('contact') }}" class="rounded px-3 py-2 text-sm text-white/90 hover:bg-white/10">{{ __('İletişim') }}</a>
            @include('site.partials.language-switcher')
        </nav>
    </div>
</header>
