<footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 py-12 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-3">
                @include('site.partials.logo', ['onDark' => false, 'class' => 'items-start'])
            </div>
            <div>
                <h3 class="mb-3 text-lg font-bold text-slate-900">Önemli</h3>
                <ul class="space-y-2 text-sm text-slate-800 font-medium">
                    <li><a href="{{ route('about') }}" class="hover:text-uid-navy">Hakkımızda</a></li>
                    <li><a href="{{ route('membership.create') }}" class="hover:text-uid-navy">Üye ol</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-uid-navy">Haberler</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-uid-navy">İletişim</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-3 text-lg font-bold text-slate-900">İletişim</h3>
                <address class="not-italic text-sm leading-relaxed text-slate-800 font-medium">
                    UID Bosna Hersek<br>
                    <a href="mailto:bosna@u-id.org" class="inline-block hover:text-uid-navy">bosna@u-id.org</a>
                </address>
            </div>
            <div>
                <h3 class="mb-3 text-lg font-bold text-slate-900">Bizi Takip Edin</h3>
                <div class="flex items-center gap-4 text-uid-navy">
                    <a href="https://www.instagram.com/uidbih/" target="_blank" rel="noopener noreferrer" class="hover:text-uid-blue transition" aria-label="Instagram">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8A3.6 3.6 0 0 0 7.6 20h8.8A3.6 3.6 0 0 0 20 16.4V7.6A3.6 3.6 0 0 0 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/uetdbosnahersek" target="_blank" rel="noopener noreferrer" class="hover:text-uid-blue transition" aria-label="Facebook">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12a10 10 0 1 0-11.5 9.95v-7.03h-2.2V12h2.2V9.48c0-2.17 1.4-3.35 3.3-3.35.94 0 1.95.17 1.95.17v2.14h-1.1c-1.09 0-1.43.68-1.43 1.38V12h2.43l-.39 2.92h-2.04v7.03A10 10 0 0 0 22 12"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-slate-200 pt-6">
            <div class="flex flex-col items-center justify-between gap-4 text-xs text-slate-500 sm:flex-row">
                <p>© {{ date('Y') }} Union of International Democrats</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="hover:text-uid-navy">Yasal bildirim</a>
                    <a href="{{ route('legal.kvkk') }}" class="hover:text-uid-navy">Veri koruması</a>
                    <a href="#" class="hover:text-uid-navy">Çerezler</a>
                </div>
            </div>
        </div>
    </div>
</footer>
