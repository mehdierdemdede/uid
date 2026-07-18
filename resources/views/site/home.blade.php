@extends('layouts.site')

@section('title', 'Ana Sayfa — UID Bosna Hersek')

@section('content')
    <section class="relative min-h-[560px] overflow-hidden md:min-h-[680px]">
        <img
            src="{{ asset('images/uid_flagge22-scaled.jpg') }}"
            alt="UID Bosna Hersek"
            class="absolute inset-0 h-full w-full object-cover object-center"
            width="1920"
            height="1080"
            loading="eager"
            fetchpriority="high"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#05235f]/95 via-[#06347f]/82 to-[#083e89]/30"></div>

        <div class="relative z-10 mx-auto flex min-h-[560px] max-w-7xl flex-col justify-center px-4 py-16 md:min-h-[680px] md:px-8 lg:px-10">
            <div class="max-w-3xl space-y-5 text-white">
                <p class="text-sm font-medium tracking-wide text-white/90 md:text-base">Union of International Democrats</p>
                <div class="flex gap-4">
                    <span class="hidden w-1 shrink-0 rounded-full bg-white md:block" aria-hidden="true"></span>
                    <div class="space-y-3">
                        <h1 class="text-4xl font-bold leading-tight md:text-5xl lg:text-6xl">
                            UID, yurt dışındaki Türk kökenli kişilerin siyasi
                        </h1>
                        <p class="max-w-xl text-base text-white/90 md:text-xl">
                            sosyal ve kültürel gelişimini, Bosna Hersek odaklı faaliyetlerle desteklemektedir.
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-4">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 bg-white px-8 py-3 text-sm font-semibold text-slate-800 transition hover:bg-slate-100">
                        Haberler
                        <span aria-hidden="true">&gt;</span>
                    </a>
                    <a href="{{ route('membership.create') }}" class="inline-flex items-center gap-2 bg-uid-blue px-8 py-3 text-sm font-semibold text-white transition hover:bg-uid-blue/90">
                        Üye ol
                        <span aria-hidden="true">&gt;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white bg-cover bg-center py-16 md:py-20" style="background-image: url('{{ asset('images/bg_weiss.jpg') }}');">
        <div class="mx-auto max-w-5xl px-4 md:px-6 lg:px-8">
            <div class="mb-10 flex items-center gap-4">
                <span class="h-px flex-1 bg-slate-400" aria-hidden="true"></span>
                <h2 class="shrink-0 text-sm font-medium text-slate-500">Güncel</h2>
                <span class="h-px flex-1 bg-slate-400" aria-hidden="true"></span>
            </div>

            <div class="overflow-hidden border border-slate-200 bg-white shadow">
                <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="group relative block aspect-video bg-slate-800">
                    <img
                        src="{{ asset('images/hakkimizda.jpg') }}"
                        alt="UID güncel video"
                        class="h-full w-full object-cover transition group-hover:scale-[1.01]"
                        width="1200"
                        height="675"
                        loading="lazy"
                    >
                    <span class="absolute inset-0 bg-uid-deep/20"></span>
                    <span class="absolute left-1/2 top-1/2 flex h-20 w-20 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-uid-blue/90 text-white shadow-xl ring-8 ring-uid-blue/35 transition group-hover:scale-105">
                        <svg class="ml-1 h-9 w-9" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                        <span class="sr-only">Videoyu aç</span>
                    </span>
                    <div class="absolute bottom-4 left-4 bg-white/95 px-4 py-3 shadow">
                        <p class="text-2xl font-semibold text-uid-navy">Kenan ASLAN</p>
                        <p class="text-lg text-uid-navy/80">Genel Başkan</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 md:py-20">
        <div class="mx-auto grid max-w-6xl items-center gap-10 px-4 md:grid-cols-2 md:px-8">
            <div class="space-y-5 text-center md:text-left">
                <h2 class="text-4xl font-bold text-uid-navy md:text-5xl">İş İnsanları Üyelik Fırsatları</h2>
                <p class="text-lg text-slate-700">Tic üyelik ile tüm çalışanlarınıza erişim imkanı.</p>
                <ul class="space-y-3 text-lg text-slate-700">
                    <li class="flex items-start justify-center gap-3 md:justify-start">
                        <span class="mt-1 inline-block h-6 w-6 rounded-full bg-uid-navy text-center text-sm leading-6 text-white">✓</span>
                        Çalışanlarınıza özel; seyahat, moda, teknoloji, ev ve yaşamda indirimler.
                    </li>
                    <li class="flex items-start justify-center gap-3 md:justify-start">
                        <span class="mt-1 inline-block h-6 w-6 rounded-full bg-uid-navy text-center text-sm leading-6 text-white">✓</span>
                        Tek üyelik ile tüm çalışanlara erişim.
                    </li>
                    <li class="flex items-start justify-center gap-3 md:justify-start">
                        <span class="mt-1 inline-block h-6 w-6 rounded-full bg-uid-navy text-center text-sm leading-6 text-white">✓</span>
                        Platformumuza kolay erişim ve güçlü network.
                    </li>
                </ul>
                <a href="{{ route('membership.create') }}" class="inline-flex items-center justify-center bg-uid-navy px-7 py-3 text-sm font-semibold text-white transition hover:bg-uid-navy/90">
                    İş İnsanları Üyelik Fırsatları
                </a>
            </div>
            <div class="mx-auto w-full max-w-[460px] border border-slate-200 bg-white p-2 shadow-lg">
                <img src="{{ asset('images/bg_uid.jpg') }}" alt="UID Üyelik Fırsatları" class="h-auto w-full object-cover">
            </div>
        </div>
    </section>

    <section class="bg-cover bg-center py-16 text-white md:py-24" style="background-image: url('{{ asset('images/bg_blue.png') }}');">
        <div class="mx-auto grid max-w-[1400px] items-center gap-8 px-4 md:grid-cols-[1.2fr_1fr] md:px-8 lg:px-10">
            <div>
                <h2 class="mb-6 text-4xl font-bold md:text-5xl">Misyonumuz</h2>
                <div class="space-y-4 text-base leading-relaxed text-white/95 md:text-lg">
                    <p>
                        2004 yılında Köln'de UETD - Union of European Turkish Democrats ismi altında kurulan ve tüm dünyadan gelen taleplere cevap verebilmek için, 20 Mayıs 2018'de Bosna Hersek'te gerçekleşen 6. Olağan Genel Kurulu ile ismini UID - Union of International Democrats olarak değiştirerek bir dünya teşkilatına evrilmiştir.
                    </p>
                    <p>
                        UID Türklerin ve kardeş toplulukların ilişkilerini küresel çapta güçlendirerek ekonomik, sosyal ve kültürel olarak daha yakın ilişkiler tesis etmeyi hedeflemektedir.
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-end px-4">
                <img src="{{ asset('images/Weltkarte.png') }}" alt="Misyon Dünya Haritası" class="h-auto w-full max-w-[520px] object-contain opacity-95">
            </div>
        </div>
    </section>

    <section class="bg-cover bg-center py-16 text-white md:py-24" style="background-image: url('{{ asset('images/bg_turkis.jpg') }}');">
        <div class="mx-auto grid max-w-[1400px] items-center gap-8 px-4 md:grid-cols-[1.2fr_1fr] md:px-8 lg:px-10">
            <div>
                <h2 class="mb-6 text-4xl font-bold md:text-5xl">Vizyonumuz</h2>
                <div class="space-y-4 text-base leading-relaxed text-white/95 md:text-lg">
                    <p>
                        Vizyonumuz, farklı uluslara, kültürlere veya dinlere mensup insanların toplumsal yaşamın her alanına katılım sağlayan ve toplumu şekillendiren, eşit haklara sahip bireyler olmasıdır.
                    </p>
                    <p>
                        UID bu vizyona ulaşmak için, tüm dünyada Türklerin ve kardeş toplulukların yaşadıkları toplumlara uyumunu destekleyen çalışmalar yürütür; farklılıklara saygı ve karşılıklı anlayışı temel alır.
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-end px-4">
                <img src="{{ asset('images/Lampe-Idee.png') }}" alt="Vizyon İkonu" class="h-auto w-full max-w-[420px] object-contain opacity-95">
            </div>
        </div>
    </section>
@endsection
