<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Faydayı Düzenle</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-3xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Faydayı Düzenle</h1>
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

    <form action="{{ route('admin.benefits.update', $benefit) }}" method="POST" enctype="multipart/form-data" class="space-y-4 rounded bg-white p-6 shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-1 block text-sm font-medium">Başlık</label>
            <input type="text" name="title" value="{{ old('title', $benefit->title) }}" required class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">İndirim / Kısa Etiket (Opsiyonel)</label>
            <input type="text" name="discount_text" value="{{ old('discount_text', $benefit->discount_text) }}" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Açıklama (Opsiyonel)</label>
            <textarea name="description" rows="4" class="w-full rounded border-slate-300 p-2 border">{{ old('description', $benefit->description) }}</textarea>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Logo</label>
            @if($benefit->logo_path)
                <div class="mb-3">
                    <img src="/storage/{{ $benefit->logo_path }}" class="h-20 object-contain rounded">
                    <label class="mt-2 text-sm flex items-center gap-2">
                        <input type="checkbox" name="remove_logo" value="1"> Logoyu Sil
                    </label>
                </div>
            @endif
            <input type="file" name="logo" accept="image/*" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Sıra</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $benefit->sort_order) }}" min="0" class="w-full rounded border-slate-300 p-2 border">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $benefit->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm font-medium">Aktif (sitede görünsün)</label>
        </div>

        <div class="pt-4 text-right">
            <button type="submit" class="rounded bg-uid-blue px-6 py-2 font-bold text-white hover:bg-uid-blue/90">Değişiklikleri Kaydet</button>
        </div>
    </form>
  </div>
</body>
</html>
