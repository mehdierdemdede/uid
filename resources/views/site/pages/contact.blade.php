@extends('layouts.site')

@section('title', 'İletişim — UID Bosna Hersek')

@section('content')
<section class="relative h-[260px] w-full overflow-hidden bg-uid-navy md:h-[420px]">
    <video class="h-full w-full object-cover object-center" autoplay muted loop playsinline poster="{{ asset('images/contact-banner.png') }}">
        <source src="{{ asset('images/flagge.mp4') }}" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-gradient-to-r from-uid-navy/80 via-uid-navy/40 to-black/15"></div>
    <div class="absolute inset-0 flex items-end">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <div class="mb-6 flex items-center gap-4 border-l-4 border-white pl-4 md:mb-10 md:pl-6">
                <h1 class="text-3xl font-bold tracking-tight text-white md:text-5xl">İletişim</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#efefef] py-14 md:py-20">
    <div class="mx-auto max-w-2xl px-4 md:px-8">
        @if(session('success'))
            <div class="mb-6 border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 border border-red-200 bg-red-50 p-4 text-red-800">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
            @csrf
            @honeypot

            <div>
                <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Ad Soyad</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ad Soyad" required
                       class="w-full border border-slate-300 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-uid-blue focus:ring-0">
            </div>

            <div>
                <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">E-Mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-Mail" required
                       class="w-full border border-slate-300 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-uid-blue focus:ring-0">
            </div>

            <div>
                <label for="note" class="mb-1.5 block text-sm font-semibold text-slate-700">Not</label>
                <textarea name="note" id="note" rows="5" placeholder="Not" required
                          class="w-full border border-slate-300 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-uid-blue focus:ring-0">{{ old('note') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-uid-navy py-3 text-sm font-semibold tracking-wide text-white transition hover:bg-uid-navy/90">
                Gönder
            </button>
        </form>
    </div>
</section>
@endsection
