@extends('layouts.site')

@section('title', 'Haberler — UID Bosna Hersek')

@section('content')
<div class="bg-slate-50 py-16 md:py-24">
    <div class="mx-auto max-w-6xl px-4 md:px-8">
        <h1 class="mb-10 text-3xl font-bold text-uid-navy md:text-5xl">Haberler ve Duyurular</h1>
        
        <div class="space-y-6">
            @forelse($news as $item)
                <a href="{{ route('news.show', $item) }}" class="group block overflow-hidden rounded-xl bg-white shadow transition hover:shadow-lg lg:flex">
                    <div class="relative min-h-[240px] w-full shrink-0 overflow-hidden lg:w-2/5">
                        @if($item->image_path)
                            <img src="/storage/{{ $item->image_path }}" alt="{{ $item->title }}" class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center bg-slate-200">
                                <span class="text-slate-400">Görsel Yok</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col justify-center p-6 md:p-8">
                        <h2 class="mb-3 text-xl font-bold text-slate-900 md:text-2xl">{{ $item->title }}</h2>
                        <p class="mb-4 text-base leading-relaxed text-slate-600 line-clamp-3">
                            {{ $item->summary ?? Str::limit(strip_tags($item->content), 150) }}
                        </p>
                        <time class="mt-auto text-sm font-medium text-uid-blue">
                            {{ $item->published_at->format('d.m.Y H:i') }}
                        </time>
                    </div>
                </a>
            @empty
                <div class="rounded-xl border border-slate-200 bg-white p-10 text-center">
                    <p class="text-lg text-slate-500">Henüz yayınlanmış bir haber bulunmuyor.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection
