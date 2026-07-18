<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basvuru Detay</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-3xl space-y-4">
    <a href="{{ route('admin.applications.index') }}" class="text-uid-blue underline">Geri don</a>
    <h1 class="text-2xl font-bold">Basvuru #{{ $application->id }}</h1>
    <div class="rounded bg-white p-4 shadow">
      <p><strong>Ad Soyad:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
      <p><strong>E-posta:</strong> {{ $application->email }}</p>
      <p><strong>Telefon:</strong> {{ $application->phone }}</p>
      @if($application->reviewedBy)
        <p><strong>Son inceleyen:</strong> {{ $application->reviewedBy->name }}</p>
      @endif
    </div>
    <form method="POST" action="{{ route('admin.applications.update',$application) }}" class="rounded bg-white p-4 shadow space-y-3">@csrf @method('PATCH')
      <select name="status" class="w-full rounded border-slate-300">@foreach($statuses as $status)<option value="{{ $status->value }}" @selected($application->status===$status->value)>{{ $status->value }}</option>@endforeach</select>
      <textarea name="admin_notes" class="w-full rounded border-slate-300" rows="4">{{ old('admin_notes',$application->admin_notes) }}</textarea>
      <button class="rounded bg-uid-blue px-4 py-2 text-white">Guncelle</button>
    </form>
  </div>
</body>
</html>
