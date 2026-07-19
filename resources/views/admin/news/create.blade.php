<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yeni Haber Ekle</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-3xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Yeni Haber Ekle</h1>
        <a href="{{ route('admin.news.index') }}" class="text-uid-blue hover:underline">Geri Dön</a>
    </div>

    @if($errors->any())
        <div class="rounded bg-red-100 p-4 text-red-800">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 rounded bg-white p-6 shadow">
        @csrf
        
        <div class="rounded border border-slate-200 p-4">
            <h2 class="mb-3 text-sm font-bold uppercase text-slate-500">Türkçe (zorunlu)</h2>
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium">Başlık</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded border-slate-300 p-2 border">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">Kısa Özet (Opsiyonel)</label>
                    <textarea name="summary" rows="3" class="w-full rounded border-slate-300 p-2 border">{{ old('summary') }}</textarea>
                    <span class="text-xs text-slate-500">Kartta görünecek kısa metin.</span>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">İçerik</label>
                    <textarea name="content" rows="10" required class="w-full rounded border-slate-300 p-2 border">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>

        <div class="rounded border border-slate-200 p-4">
            <h2 class="mb-3 text-sm font-bold uppercase text-slate-500">Bosanski (opsiyonel)</h2>
            <p class="mb-3 text-xs text-slate-500">Boş bırakılırsa Boşnakça sayfada Türkçe metin gösterilir.</p>
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium">Naslov</label>
                    <input type="text" name="title_bs" value="{{ old('title_bs') }}" class="w-full rounded border-slate-300 p-2 border">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">Kratki sažetak (opciono)</label>
                    <textarea name="summary_bs" rows="3" class="w-full rounded border-slate-300 p-2 border">{{ old('summary_bs') }}</textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">Sadržaj</label>
                    <textarea name="content_bs" rows="10" class="w-full rounded border-slate-300 p-2 border">{{ old('content_bs') }}</textarea>
                </div>
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Kapak Resmi</label>
            <input type="file" name="image" accept="image/*" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}>
            <label for="is_published" class="text-sm font-medium">Hemen Yayınla</label>
        </div>

        <div class="pt-4 text-right">
            <button type="submit" class="rounded bg-uid-blue px-6 py-2 font-bold text-white hover:bg-uid-blue/90">Kaydet</button>
        </div>
    </form>
  </div>
</body>
</html>
