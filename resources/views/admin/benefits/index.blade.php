<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Üyelik Faydaları</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-7xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Üyelik Faydaları</h1>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.applications.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Başvurular</a>
            <a href="{{ route('admin.messages.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Mesajlar</a>
            <a href="{{ route('admin.news.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Haberler</a>
            <a href="{{ route('admin.benefits.create') }}" class="rounded bg-uid-blue px-4 py-2 text-white hover:bg-uid-blue/90">Yeni Fayda Ekle</a>
        </div>
    </div>

    @if(session('success'))
        <div class="rounded bg-green-100 p-4 text-green-800">{{ session('success') }}</div>
    @endif

    <table class="min-w-full overflow-hidden rounded bg-white text-sm shadow">
      <thead class="bg-slate-100">
        <tr>
            <th class="px-3 py-2 text-left">Logo</th>
            <th class="px-3 py-2 text-left">Başlık</th>
            <th class="px-3 py-2 text-left">İndirim</th>
            <th class="px-3 py-2 text-left">Sıra</th>
            <th class="px-3 py-2 text-left">Durum</th>
            <th class="px-3 py-2 text-left">Ekleyen</th>
            <th class="px-3 py-2">İşlemler</th>
        </tr>
      </thead>
      <tbody>
      @forelse($benefits as $benefit)
        <tr class="border-t">
            <td class="px-3 py-2">
                @if($benefit->logo_path)
                    <img src="/storage/{{ $benefit->logo_path }}" class="h-10 w-16 object-contain rounded">
                @else
                    <span class="text-slate-400">Yok</span>
                @endif
            </td>
            <td class="px-3 py-2">{{ $benefit->title }}</td>
            <td class="px-3 py-2">{{ $benefit->discount_text ?? '-' }}</td>
            <td class="px-3 py-2">{{ $benefit->sort_order }}</td>
            <td class="px-3 py-2">
                @if($benefit->is_active)
                    <span class="rounded bg-green-100 px-2 py-1 text-xs text-green-800">Aktif</span>
                @else
                    <span class="rounded bg-slate-100 px-2 py-1 text-xs text-slate-800">Pasif</span>
                @endif
            </td>
            <td class="px-3 py-2">{{ $benefit->createdBy->name ?? '-' }}</td>
            <td class="px-3 py-2 text-center flex items-center justify-center gap-2">
                <a class="text-uid-blue underline" href="{{ route('admin.benefits.edit', $benefit) }}">Düzenle</a>
                <form action="{{ route('admin.benefits.destroy', $benefit) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 underline">Sil</button>
                </form>
            </td>
        </tr>
      @empty
        <tr><td class="px-3 py-4 text-center text-slate-500" colspan="7">Kayıt bulunamadı.</td></tr>
      @endforelse
      </tbody>
    </table>
    {{ $benefits->links() }}
  </div>
</body>
</html>
