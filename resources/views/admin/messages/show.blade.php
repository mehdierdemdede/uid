<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mesaj Detay</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 p-6">
  <div class="mx-auto max-w-3xl space-y-4">
    <a href="{{ route('admin.messages.index') }}" class="text-uid-blue underline">Geri don</a>
    <h1 class="text-2xl font-bold">Mesaj #{{ $message->id }}</h1>
    <div class="rounded bg-white p-4 shadow space-y-2">
      <p><strong>Ad Soyad:</strong> {{ $message->name }}</p>
      <p><strong>E-posta:</strong> {{ $message->email }}</p>
      <p><strong>Tarih:</strong> {{ $message->created_at->format('d.m.Y H:i') }}</p>
      @if($message->readBy)
        <p><strong>Okuyan:</strong> {{ $message->readBy->name }}</p>
      @endif
      <p><strong>Mesaj:</strong></p>
      <p class="whitespace-pre-line">{{ $message->note }}</p>
    </div>
  </div>
</body>
</html>
