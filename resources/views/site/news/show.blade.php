@extends('layouts.site')

@section('title', $news->title . ' — UID Bosna Hersek')

@section('content')
<div class="bg-white py-16 md:py-24">
    <div class="mx-auto max-w-4xl px-4 md:px-8">
        <a href="{{ route('news.index') }}" class="mb-8 inline-flex items-center text-sm font-medium text-uid-blue hover:underline">
            &larr; Haberlere Dön
        </a>

        @if($news->image_path)
            <div class="mb-10 overflow-hidden rounded-2xl shadow-md">
                <img src="/storage/{{ $news->image_path }}" alt="{{ $news->title }}" class="h-auto w-full max-h-[500px] object-cover">
            </div>
        @endif

        <h1 class="mb-4 text-3xl font-bold text-slate-900 md:text-5xl">{{ $news->title }}</h1>
        <div class="mb-10 flex items-center gap-4 text-sm font-medium text-slate-500 border-b border-slate-200 pb-6">
            <time datetime="{{ $news->published_at->toIso8601String() }}">{{ $news->published_at->format('d.m.Y H:i') }}</time>
            <span>&bull;</span>
            <span>UID Yönetimi</span>
        </div>

        <div class="space-y-6 text-lg leading-relaxed text-slate-700">
            {!! nl2br(e($news->content)) !!}
        </div>
    </div>
</div>
@endsection
