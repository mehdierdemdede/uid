<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yeni Fayda Ekle</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-3xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Yeni Fayda Ekle</h1>
        <a href="{{ route('admin.benefits.index') }}" class="text-uid-blue hover:underline">Geri Dön</a>
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

    <form action="{{ route('admin.benefits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 rounded bg-white p-6 shadow">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-medium">Başlık</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Örn: Medicana Sarajevo Hastanesi" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">İndirim / Kısa Etiket (Opsiyonel)</label>
            <input type="text" name="discount_text" value="{{ old('discount_text') }}" placeholder="Örn: %20 İndirim" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Açıklama (Opsiyonel)</label>
            <textarea name="description" rows="4" class="w-full rounded border-slate-300 p-2 border">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Logo (Opsiyonel)</label>
            <input type="file" name="logo" accept="image/*" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Sıra</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full rounded border-slate-300 p-2 border">
            <span class="text-xs text-slate-500">Küçük sayı önce görünür.</span>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm font-medium">Aktif (sitede görünsün)</label>
        </div>

        <div class="pt-4 text-right">
            <button type="submit" class="rounded bg-uid-blue px-6 py-2 font-bold text-white hover:bg-uid-blue/90">Kaydet</button>
        </div>
    </form>
  </div>
</body>
</html>
