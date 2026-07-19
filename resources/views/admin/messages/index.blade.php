<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iletisim Mesajlari</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-7xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Iletisim Mesajlari</h1>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.applications.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Başvurular</a>
            <a href="{{ route('admin.news.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Haberler</a>
            <a href="{{ route('admin.benefits.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Faydalar</a>
        </div>
    </div>

    <table class="min-w-full overflow-hidden rounded bg-white text-sm shadow">
      <thead class="bg-slate-100">
        <tr>
            <th class="px-3 py-2 text-left">ID</th>
            <th class="px-3 py-2 text-left">Ad Soyad</th>
            <th class="px-3 py-2 text-left">E-posta</th>
            <th class="px-3 py-2 text-left">Durum</th>
            <th class="px-3 py-2 text-left">Tarih</th>
        </tr>
      </thead>
      <tbody>
      @forelse($messages as $message)
        <tr class="border-t {{ $message->is_read ? '' : 'font-semibold' }}">
            <td class="px-3 py-2"><a class="text-uid-blue underline" href="{{ route('admin.messages.show', $message) }}">{{ $message->id }}</a></td>
            <td class="px-3 py-2">{{ $message->name }}</td>
            <td class="px-3 py-2">{{ $message->email }}</td>
            <td class="px-3 py-2">
                @if($message->is_read)
                    <span class="rounded bg-slate-100 px-2 py-1 text-xs text-slate-800">Okundu</span>
                @else
                    <span class="rounded bg-uid-blue/10 px-2 py-1 text-xs text-uid-blue">Yeni</span>
                @endif
            </td>
            <td class="px-3 py-2">{{ $message->created_at->format('d.m.Y H:i') }}</td>
        </tr>
      @empty
        <tr><td class="px-3 py-4 text-center text-slate-500" colspan="5">Mesaj yok.</td></tr>
      @endforelse
      </tbody>
    </table>
    {{ $messages->links() }}
  </div>
</body>
</html>
