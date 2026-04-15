<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Giris</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100 p-6">
  <div class="mx-auto max-w-md rounded bg-white p-6 shadow">
    <h1 class="mb-4 text-xl font-bold">Admin Giris</h1>
    @if($errors->any())<p class="mb-3 text-sm text-red-600">{{ $errors->first() }}</p>@endif
    <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-3">@csrf
      <input type="email" name="email" class="w-full rounded border-slate-300" placeholder="E-posta" required>
      <input type="password" name="password" class="w-full rounded border-slate-300" placeholder="Sifre" required>
      <button class="rounded bg-uid-blue px-4 py-2 text-white">Giris yap</button>
    </form>
  </div>
</body>
</html>
