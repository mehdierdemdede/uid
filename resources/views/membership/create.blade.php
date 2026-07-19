@extends('layouts.site')

@section('title', __('Üyelik Başvurusu').' — UID Bosna Hersek')

@section('content')
<section class="relative h-[240px] w-full overflow-hidden bg-uid-navy md:h-[360px]">
    <img src="{{ asset('images/uye_ol.jpg') }}" alt="{{ __('Üye Ol') }}" class="h-full w-full object-cover object-center">
    <div class="absolute inset-0 bg-gradient-to-r from-uid-navy/85 via-uid-navy/55 to-uid-navy/20"></div>
    <div class="absolute inset-0 flex items-center">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <div class="flex items-center gap-4 border-l-4 border-white pl-4 md:pl-6">
                <h2 class="text-4xl font-bold text-white md:text-5xl">{{ __('Üye ol') }}</h2>
            </div>
        </div>
    </div>
</section>

<div class="bg-[#efefef] py-10 md:py-14">
    <div class="mx-auto max-w-5xl px-4 md:px-8">
        <div class="mb-8 flex justify-center md:mb-10">
            <img src="{{ asset('images/uid-logo.png') }}" alt="UID Bosna Hersek" class="h-24 w-auto md:h-40">
        </div>

        <div class="rounded-t-lg border border-slate-200 bg-white px-6 py-10 text-center md:px-10 md:py-12">
            <h1 class="text-4xl font-bold tracking-tight text-slate-800 md:text-5xl">{{ __('Üyelik Kayıt Formu') }}</h1>
            <p class="mt-3 text-lg text-slate-600 md:text-2xl">Membership Registration Form</p>
            <p class="mt-4 text-sm text-slate-500">{{ __('Lütfen aşağıdaki formu eksiksiz doldurunuz.') }} <span class="text-red-500">*</span> {{ __('ile işaretli alanlar zorunludur.') }}</p>
        </div>

        @if($errors->any())
            <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ t_route('membership.store') }}" class="space-y-8 border border-t-0 border-slate-200 bg-white p-6 shadow-sm md:p-10">
            @csrf
            @honeypot

            {{-- İsim Soyisim --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('İsim Soyisim') }} <span class="text-red-500">*</span></label>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required placeholder="{{ __('İsim') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                        <span class="mt-1 block text-xs text-slate-400">{{ __('İsim - Name') }}</span>
                    </div>
                    <div>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required placeholder="{{ __('Soyisim') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                        <span class="mt-1 block text-xs text-slate-400">{{ __('Soyisim - Surname') }}</span>
                    </div>
                </div>
            </div>

            {{-- Doğum Tarihi & E-Posta --}}
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('Doğum Tarihi') }}</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">{{ __('Birthdate') }}</span>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('E-Posta') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@email.com" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">E-Mail</span>
                </div>
            </div>

            {{-- Şehir --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('Şehir') }} <span class="text-red-500">*</span></label>
                <input type="text" name="city" value="{{ old('city') }}" required placeholder="{{ __('Şehir') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                <span class="mt-1 block text-xs text-slate-400">{{ __('Şehir - City') }}</span>
            </div>

            {{-- Telefon & Meslek --}}
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('Cep') }} <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+387 XX XXX XXXX" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">{{ __('Mobile Phone') }}</span>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('Meslek') }}</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="{{ __('Meslek') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">
                    <span class="mt-1 block text-xs text-slate-400">{{ __('Occupation') }}</span>
                </div>
            </div>

            {{-- Yorum / Mesaj --}}
            <div>
                <label class="mb-2 block text-sm font-bold text-slate-700">{{ __('Yorum veya Mesajınız') }}</label>
                <textarea name="notes" rows="4" placeholder="{{ __('Mesajınızı buraya yazabilirsiniz...') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-uid-blue focus:ring-uid-blue">{{ old('notes') }}</textarea>
                <span class="mt-1 block text-xs text-slate-400">{{ __('Message') }}</span>
            </div>

            {{-- KVKK & Tüzük --}}
            <div class="space-y-3 rounded-lg bg-slate-50 p-4">
                <label class="flex items-start gap-3 text-sm text-slate-700">
                    <input type="checkbox" name="kvkk_onayi" value="1" required class="mt-0.5 rounded border-slate-300 text-uid-blue focus:ring-uid-blue">
                    <span>{!! __(':link okudum ve kabul ediyorum.', ['link' => '<a href="'.t_route('legal.kvkk').'" target="_blank" class="font-medium text-uid-blue hover:underline">'.__('KVKK metnini').'</a>']) !!}</span>
                </label>
                <label class="flex items-start gap-3 text-sm text-slate-700">
                    <input type="checkbox" name="tuzuk_onayi" value="1" required class="mt-0.5 rounded border-slate-300 text-uid-blue focus:ring-uid-blue">
                    <span>{!! __(':link okudum ve kabul ediyorum.', ['link' => '<a href="'.t_route('legal.tuzuk').'" target="_blank" class="font-medium text-uid-blue hover:underline">'.__('Tüzük metnini').'</a>']) !!}</span>
                </label>
            </div>

            {{-- Hidden fields for captcha --}}
            @if($captchaProvider)
                <input type="hidden" name="captcha_token" id="captcha_token">
            @endif

            <div class="pt-2">
                <button type="submit" class="w-full rounded-lg bg-uid-navy px-6 py-3.5 text-base font-bold text-white shadow-md transition hover:bg-uid-navy/90 hover:shadow-lg">
                    {{ __('Başvuruyu Gönder') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
