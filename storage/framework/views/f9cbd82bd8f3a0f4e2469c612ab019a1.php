<?php $__env->startSection('title', 'Ana Sayfa — UID Bosna Hersek'); ?>

<?php $__env->startSection('content'); ?>
    
    <section
        class="relative min-h-[560px] overflow-hidden md:min-h-[680px]"
        x-data="{
            i: 0,
            n: 2,
            timer: null,
            start() {
                clearInterval(this.timer);
                this.timer = setInterval(() => { this.i = (this.i + 1) % this.n }, 9000);
            },
            go(to) {
                this.i = ((to % this.n) + this.n) % this.n;
                this.start();
            },
            prev() { this.go(this.i - 1); },
            next() { this.go(this.i + 1); }
        }"
        x-init="start()"
    >
        <div class="absolute inset-0 bg-slate-900">
            <img
                src="https://images.unsplash.com/photo-1564959130747-e5fac936870a?auto=format&amp;fit=crop&amp;w=1920&amp;q=80"
                alt=""
                class="h-full w-full object-cover object-center opacity-90"
                width="1920"
                height="1080"
                loading="eager"
                fetchpriority="high"
            >
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0a1e4d] via-[#0a1e4d]/88 to-[#0a1e4d]/35"></div>

        <div class="relative z-10 mx-auto flex min-h-[560px] max-w-7xl flex-col justify-center px-4 py-16 md:min-h-[680px] md:px-8 lg:px-10">
            <div class="max-w-3xl space-y-6 text-white">
                <div class="relative min-h-[200px] md:min-h-[220px]">
                    <div x-show="i === 0" x-transition.opacity.duration.400ms class="absolute inset-0 space-y-4">
                        <p class="text-sm font-medium uppercase tracking-wider text-white/80">Union of International Democrats</p>
                        <div class="flex gap-4">
                            <span class="hidden w-1 shrink-0 rounded-full bg-white md:block" aria-hidden="true"></span>
                            <div class="space-y-3">
                                <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                                    UID, Bosna-Hersek'teki Türk kökenli kişilerin siyasi
                                </h1>
                                <p class="text-lg text-white/90 md:text-xl">
                                    sosyal ve kültürel gelişimini ve ilgili ülkedeki faaliyetlerini desteklemektedir.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div x-show="i === 1" x-cloak x-transition.opacity.duration.400ms class="absolute inset-0 space-y-4">
                        <p class="text-sm font-medium uppercase tracking-wider text-white/80">UID Bosna Hersek</p>
                        <div class="flex gap-4">
                            <span class="hidden w-1 shrink-0 rounded-full bg-white md:block" aria-hidden="true"></span>
                            <div class="space-y-3">
                                <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                                    Yerelde güçlü temsil, küresel dayanışma
                                </h1>
                                <p class="text-lg text-white/90 md:text-xl">
                                    Demokratik katılım ve toplumsal uyum için çalışıyoruz. Birlikte daha güçlüyüz.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="<?php echo e(route('news.index')); ?>" class="inline-flex items-center gap-2 rounded-md bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-sm transition hover:bg-slate-100">
                        Haberler
                        <span aria-hidden="true">&gt;</span>
                    </a>
                    <a href="<?php echo e(route('membership.create')); ?>" class="inline-flex items-center gap-2 rounded-md bg-uid-blue px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-uid-blue/90">
                        Üye ol
                        <span aria-hidden="true">&gt;</span>
                    </a>
                </div>

                <div class="flex items-center gap-3 pt-4">
                    <button type="button" class="rounded-full border border-white/40 p-2 text-white hover:bg-white/10" @click="prev()" aria-label="Önceki slayt">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <div class="flex gap-2">
                        <button type="button" class="h-2.5 w-2.5 rounded-full transition" :class="i === 0 ? 'bg-white' : 'bg-white/40 hover:bg-white/70'" @click="go(0)" aria-label="Slayt 1"></button>
                        <button type="button" class="h-2.5 w-2.5 rounded-full transition" :class="i === 1 ? 'bg-white' : 'bg-white/40 hover:bg-white/70'" @click="go(1)" aria-label="Slayt 2"></button>
                    </div>
                    <button type="button" class="rounded-full border border-white/40 p-2 text-white hover:bg-white/10" @click="next()" aria-label="Sonraki slayt">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-uid-pattern-light py-16 md:py-20">
        <div class="mx-auto max-w-5xl px-4 md:px-6 lg:px-8">
            <div class="mb-10 flex items-center gap-4">
                <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                <h2 class="shrink-0 text-sm font-semibold uppercase tracking-widest text-slate-500">Güncel</h2>
                <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
            </div>

            <div class="overflow-hidden rounded-xl bg-slate-200 shadow-lg ring-1 ring-slate-200/80">
                <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="group relative block aspect-video bg-slate-800">
                    <img
                        src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                        alt=""
                        class="h-full w-full object-cover opacity-90 transition group-hover:opacity-100"
                        width="1200"
                        height="675"
                        loading="lazy"
                    >
                    <span class="absolute inset-0 bg-uid-deep/20 transition group-hover:bg-uid-deep/10"></span>
                    <span class="absolute left-1/2 top-1/2 flex h-16 w-16 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-uid-blue text-white shadow-lg ring-4 ring-white/30 transition group-hover:scale-105">
                        <svg class="ml-1 h-7 w-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                        <span class="sr-only">Videoyu aç (örnek bağlantı)</span>
                    </span>
                    <div class="absolute bottom-4 left-4 max-w-[min(100%,280px)] rounded-lg bg-white/95 p-3 shadow-md backdrop-blur-sm">
                        <div class="flex items-center gap-2">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-uid-teal to-uid-navy text-white" aria-hidden="true">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3c-1.5 3-4 5.5-4 9a4 4 0 108 0c0-3.5-2.5-6-4-9z"/></svg>
                            </span>
                            <div>
                                <p class="text-sm font-bold text-uid-navy">Kenan ASLAN</p>
                                <p class="text-xs text-uid-navy/80">Genel Başkan</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <p class="mt-3 text-center text-xs text-slate-500">Video bağlantısı örnek olarak YouTube ana sayfasına gider; gerçek yayın URL’si eklendiğinde güncellenebilir.</p>
        </div>
    </section>

    
    <section class="bg-uid-navy py-16 text-white md:py-24">
        <div class="mx-auto grid max-w-[1400px] items-center gap-8 px-4 md:grid-cols-[1.2fr_1fr] md:px-8 lg:px-10">
            <div>
                <h2 class="mb-6 text-3xl font-bold md:text-4xl">Misyonumuz</h2>
                <div class="space-y-4 text-base leading-relaxed text-white/95 sm:text-lg">
                    <p>
                        2004 yılında Köln’de UETD – Union of European Turkish Democrats ismi altında kurulan ve tüm dünyadan gelen taleplere cevap verebilmek için, 20 Mayıs 2018’de Bosna Hersek’te gerçekleşen, 6. Olağan Genel Kurulu ile ismini UID – Union of International Democrats olarak değiştirerek bir dünya teşkilatına evrilmiştir. UID Türklerin ve kardeş toplulukların ilişkilerini küresel çapta güçlendirerek ekonomik, sosyal ve kültürel olarak daha yakın ilişkiler tesis edecektir.
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-end px-4">
                <img src="/images/map.png" alt="Misyon Dünya Haritası" class="h-auto w-full max-w-[500px] object-contain opacity-90">
            </div>
        </div>
    </section>

    
    <section class="bg-uid-teal py-16 text-white md:py-24">
        <div class="mx-auto grid max-w-[1400px] items-center gap-8 px-4 md:grid-cols-[1.2fr_1fr] md:px-8 lg:px-10">
            <div>
                <h2 class="mb-6 text-3xl font-bold md:text-4xl">Vizyonumuz</h2>
                <div class="space-y-4 text-base leading-relaxed text-white/95 sm:text-lg">
                    <p>
                        Vizyonumuz, farklı uluslara, kültürlere veya dinlere mensup insanların toplumsal yaşamın her alanına katılım sağlayan ve toplumu şekillendiren, eşit haklara sahip bireyler olmasıdır.
                    </p>
                    <p>
                        UID bu vizyona ulaşmak için, tüm dünyada Türklerin ve kardeş toplulukların yaşadıkları ülkenin toplumuna intibakını destekleyen çalışmalar yapmaktadır. Kurumsal çalışmalarımızın temelini farklılıklara saygı ve karşılıklı anlayış oluşturmaktadır. Bundan dolayı UID, temsil ettiği grubun ihtiyaçlarını ve haklarını gözeten bir sivil toplum kuruluşu olmayı, ön yargıları gidermeyi ve toplumun huzuru için dünya çapında farklı kurumlarla iş birliğinde olmayı kendine görev edinmiştir. UID faal olduğu ülkeler ile Türkiye arasında bir köprü vazifesi görüp, ülkeler arası ilişkilere katma değer sağlamaktadır.
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-end px-4">
                <img src="/images/lightbulb.png" alt="Vizyon Ampul" class="h-auto w-full max-w-[400px] object-contain opacity-90">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\apps\uid\resources\views/site/home.blade.php ENDPATH**/ ?>