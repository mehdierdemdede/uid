@extends('layouts.site')

@section('title', __('Başvurunuz Alındı').' — UID Bosna Hersek')

@section('content')
<div class="flex min-h-[70vh] items-center justify-center bg-slate-50 py-16 px-4">
    <div class="mx-auto max-w-xl text-center">
        <div class="mb-6 flex justify-center">
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-green-100">
                <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        <h1 class="mb-3 text-3xl font-bold text-uid-navy">{{ __('Başvurunuz Alındı!') }}</h1>
        <p class="mb-8 text-lg text-slate-600">{{ __('Üyelik başvurunuz başarıyla gönderildi. En kısa sürede sizinle iletişime geçeceğiz. Teşekkür ederiz.') }}</p>
        <a href="{{ t_route('home') }}" class="inline-block rounded-lg bg-uid-navy px-8 py-3 font-bold text-white shadow transition hover:bg-uid-navy/90">
            {{ __('Ana Sayfaya Dön') }}
        </a>
    </div>
</div>
@endsection
