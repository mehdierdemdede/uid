@extends('layouts.site')

@section('title', 'İletişim — UID Bosna Hersek')

@section('content')
{{-- Hero Section --}}
<div class="relative h-[300px] w-full overflow-hidden bg-uid-navy md:h-[400px]">
    <img src="{{ asset('images/contact-banner.png') }}" alt="İletişim" class="h-full w-full object-cover opacity-60">
    <div class="absolute inset-0 flex items-center">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <div class="flex items-center gap-6 border-l-[6px] border-white pl-6">
                <h1 class="text-4xl font-bold uppercase tracking-wider text-white md:text-6xl">iletişim</h1>
            </div>
        </div>
    </div>
</div>

{{-- Contact Form Section --}}
<div class="bg-white py-16 md:py-24">
    <div class="mx-auto max-w-2xl px-4 md:px-8">
        
        @if(session('success'))
            <div class="mb-8 rounded-lg bg-green-50 p-4 text-green-800 border border-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 rounded-lg bg-red-50 p-4 text-red-800 border border-red-100">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Ad Soyad</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ad Soyad" required
                       class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue">
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-700">E-Mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-Mail" required
                       class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue">
            </div>

            <div>
                <label for="note" class="mb-2 block text-sm font-medium text-slate-700">Not</label>
                <textarea name="note" id="note" rows="5" placeholder="Not" required
                          class="w-full rounded border-slate-300 px-4 py-3 text-slate-900 focus:border-uid-blue focus:ring-uid-blue">{{ old('note') }}</textarea>
            </div>

            <button type="submit" class="w-full rounded bg-uid-navy py-4 font-bold tracking-wide text-white transition hover:bg-uid-navy/90">
                Gönder
            </button>
        </form>
    </div>
</div>
@endsection
