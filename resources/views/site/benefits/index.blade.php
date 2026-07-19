@extends('layouts.site')

@section('title', __('Üyelik Faydaları').' — UID Bosna Hersek')

@section('content')
<section class="relative h-[240px] w-full overflow-hidden bg-uid-navy md:h-[360px]">
    <img src="{{ asset('images/bg_uid.jpg') }}" alt="{{ __('Üyelik Faydaları') }}" class="h-full w-full object-cover object-center">
    <div class="absolute inset-0 bg-gradient-to-r from-uid-navy/85 via-uid-navy/55 to-uid-navy/20"></div>
    <div class="absolute inset-0 flex items-center">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <div class="flex items-center gap-4 border-l-4 border-white pl-4 md:pl-6">
                <h1 class="text-4xl font-bold text-white md:text-5xl">{{ __('Üyelik Faydaları') }}</h1>
            </div>
        </div>
    </div>
</section>

<div class="bg-slate-50 py-16 md:py-24">
    <div class="mx-auto max-w-6xl px-4 md:px-8">
        <p class="mx-auto mb-10 max-w-2xl text-center text-lg text-slate-600">
            {{ __('UID üyelerine özel olarak sunulan indirim ve avantajlar.') }}
        </p>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($benefits as $benefit)
                <div class="flex flex-col rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    @if($benefit->logo_path)
                        <img src="/storage/{{ $benefit->logo_path }}" alt="{{ $benefit->title }}" class="mb-4 h-14 w-auto object-contain">
                    @endif
                    <h2 class="mb-2 text-xl font-bold text-uid-navy">{{ $benefit->title }}</h2>
                    @if($benefit->discount_text)
                        <span class="mb-3 inline-block w-fit rounded-full bg-uid-blue/10 px-3 py-1 text-sm font-semibold text-uid-blue">{{ $benefit->discount_text }}</span>
                    @endif
                    @if($benefit->description)
                        <p class="text-sm leading-relaxed text-slate-600">{{ $benefit->description }}</p>
                    @endif
                </div>
            @empty
                <div class="col-span-full rounded-xl border border-slate-200 bg-white p-10 text-center">
                    <p class="text-lg text-slate-500">{{ __('Yakında burada üyelerimize özel faydalar listelenecek.') }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ t_route('membership.create') }}" class="inline-flex items-center justify-center bg-uid-navy px-7 py-3 text-sm font-semibold text-white transition hover:bg-uid-navy/90">
                {{ __('Üye ol') }}
            </a>
        </div>
    </div>
</div>
@endsection
