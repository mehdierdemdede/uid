@extends('layouts.site')

@section('title', 'Üyelik Başvurusu — UID Bosna Hersek')

@section('content')
<div class="bg-slate-50 py-16 md:py-24">
    <div class="mx-auto max-w-3xl px-4 md:px-8">
        <h1 class="mb-2 text-3xl font-bold text-uid-navy md:text-4xl">Üyelik Başvurusu</h1>
        <p class="mb-10 text-base text-slate-500">Lütfen aşağıdaki formu eksiksiz doldurunuz. <span class="text-red-500">*</span> ile işaretli alanlar zorunludur.</p>

        @if($errors->any())
            <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('membership.store') }}" class="space-y-8 rounded-2xl bg-white p-6 shadow-lg md:p-10">
            @csrf

            {{-- İsim Soyisim --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">İsim Soyisim <span class="text-red-500">*</span></label>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required placeholder="İsim" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                        <span class="mt-1 block text-xs text-slate-400">İsim - Name</span>
                    </div>
                    <div>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required placeholder="Soyisim" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                        <span class="mt-1 block text-xs text-slate-400">Soyisim - Surname</span>
                    </div>
                </div>
            </div>

            {{-- Doğum Tarihi & E-Posta --}}
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Doğum Tarihi</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">Birthdate</span>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">E-Posta</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@email.com" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">E-Mail</span>
                </div>
            </div>

            {{-- Şehir --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">Şehir <span class="text-red-500">*</span></label>
                <input type="text" name="city" value="{{ old('city') }}" required placeholder="Şehir" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                <span class="mt-1 block text-xs text-slate-400">Şehir - City</span>
            </div>

            {{-- Telefon & Meslek --}}
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Cep <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+387 XX XXX XXXX" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">Mobile Phone</span>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Meslek</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="Meslek" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">Occupation</span>
                </div>
            </div>

            {{-- Yorum / Mesaj --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">Yorum veya Mesajınız</label>
                <textarea name="notes" rows="4" placeholder="Mesajınızı buraya yazabilirsiniz..." class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">{{ old('notes') }}</textarea>
                <span class="mt-1 block text-xs text-slate-400">Message</span>
            </div>

            {{-- KVKK & Tüzük --}}
            <div class="space-y-3 rounded-lg bg-slate-50 p-4">
                <label class="flex items-start gap-3 text-sm text-slate-700">
                    <input type="checkbox" name="kvkk_onayi" value="1" required class="mt-0.5 rounded border-slate-300 text-uid-blue focus:ring-uid-blue">
                    <span><a href="{{ route('legal.kvkk') }}" target="_blank" class="font-medium text-uid-blue hover:underline">KVKK metnini</a> okudum ve kabul ediyorum.</span>
                </label>
                <label class="flex items-start gap-3 text-sm text-slate-700">
                    <input type="checkbox" name="tuzuk_onayi" value="1" required class="mt-0.5 rounded border-slate-300 text-uid-blue focus:ring-uid-blue">
                    <span><a href="{{ route('legal.tuzuk') }}" target="_blank" class="font-medium text-uid-blue hover:underline">Tüzük metnini</a> okudum ve kabul ediyorum.</span>
                </label>
            </div>

            {{-- Hidden fields for captcha --}}
            @if($captchaProvider)
                <input type="hidden" name="captcha_token" id="captcha_token">
            @endif

            <div class="pt-2">
                <button type="submit" class="w-full rounded-lg bg-uid-navy px-6 py-3.5 text-base font-bold text-white shadow-md transition hover:bg-uid-navy/90 hover:shadow-lg">
                    Başvuruyu Gönder
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
