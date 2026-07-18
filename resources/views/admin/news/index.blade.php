<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Haber Yönetimi</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-7xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Haber Yönetimi</h1>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.applications.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Başvurular</a>
            <a href="{{ route('admin.messages.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Mesajlar</a>
            <a href="{{ route('admin.news.create') }}" class="rounded bg-uid-blue px-4 py-2 text-white hover:bg-uid-blue/90">Yeni Haber Ekle</a>
        </div>
    </div>

    @if(session('success'))
        <div class="rounded bg-green-100 p-4 text-green-800">{{ session('success') }}</div>
    @endif

    <table class="min-w-full overflow-hidden rounded bg-white text-sm shadow">
      <thead class="bg-slate-100">
        <tr>
            <th class="px-3 py-2 text-left">Görsel</th>
            <th class="px-3 py-2 text-left">Başlık</th>
            <th class="px-3 py-2 text-left">Durum</th>
            <th class="px-3 py-2 text-left">Tarih</th>
            <th class="px-3 py-2">İşlemler</th>
        </tr>
      </thead>
      <tbody>
      @forelse($news as $item)
        <tr class="border-t">
            <td class="px-3 py-2">
                @if($item->image_path)
                    <img src="/storage/{{ $item->image_path }}" class="h-10 w-16 object-cover rounded">
                @else
                    <span class="text-slate-400">Yok</span>
                @endif
            </td>
            <td class="px-3 py-2">{{ $item->title }}</td>
            <td class="px-3 py-2">
                @if($item->is_published)
                    <span class="rounded bg-green-100 px-2 py-1 text-xs text-green-800">Yayında</span>
                @else
                    <span class="rounded bg-slate-100 px-2 py-1 text-xs text-slate-800">Taslak</span>
                @endif
            </td>
            <td class="px-3 py-2">{{ $item->published_at ? $item->published_at->format('d.m.Y H:i') : '-' }}</td>
            <td class="px-3 py-2 text-center flex items-center justify-center gap-2">
                <a class="text-uid-blue underline" href="{{ route('admin.news.edit', $item) }}">Düzenle</a>
                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 underline">Sil</button>
                </form>
            </td>
        </tr>
      @empty
        <tr><td class="px-3 py-4 text-center text-slate-500" colspan="5">Kayıt bulunamadı.</td></tr>
      @endforelse
      </tbody>
    </table>
    {{ $news->links() }}
  </div>
</body>
</html>
