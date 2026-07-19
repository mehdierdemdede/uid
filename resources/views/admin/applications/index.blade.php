<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basvurular</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-7xl space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Uyelik Basvurulari</h1>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.messages.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Mesajlar</a>
            <a href="{{ route('admin.news.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Haberler</a>
            <a href="{{ route('admin.benefits.index') }}" class="rounded bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300">Faydalar</a>
        </div>
    </div>
    <table class="min-w-full overflow-hidden rounded bg-white text-sm shadow">
      <thead class="bg-slate-100"><tr><th class="px-3 py-2">ID</th><th class="px-3 py-2">Ad Soyad</th><th class="px-3 py-2">E-posta</th><th class="px-3 py-2">Durum</th></tr></thead>
      <tbody>
      @forelse($applications as $application)
        <tr class="border-t"><td class="px-3 py-2"><a class="text-uid-blue underline" href="{{ route('admin.applications.show',$application) }}">{{ $application->id }}</a></td><td class="px-3 py-2">{{ $application->first_name }} {{ $application->last_name }}</td><td class="px-3 py-2">{{ $application->email }}</td><td class="px-3 py-2">{{ $application->status }}</td></tr>
      @empty
        <tr><td class="px-3 py-4 text-center text-slate-500" colspan="4">Kayit yok.</td></tr>
      @endforelse
      </tbody>
    </table>
    {{ $applications->links() }}
  </div>
</body>
</html>
