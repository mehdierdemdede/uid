<div style="font-family: sans-serif; font-size: 14px; color: #1e293b;">
    <h2>Yeni Üyelik Başvurusu</h2>

    <p><strong>Ad Soyad:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
    <p><strong>E-Posta:</strong> {{ $application->email ?? '-' }}</p>
    <p><strong>Telefon:</strong> {{ $application->phone }}</p>
    <p><strong>Şehir:</strong> {{ $application->city }}</p>
    <p><strong>Meslek:</strong> {{ $application->occupation ?? '-' }}</p>

    @if($application->notes)
        <p><strong>Mesaj:</strong><br>{{ $application->notes }}</p>
    @endif

    <p>
        <a href="{{ route('admin.applications.show', $application) }}">Başvuruyu Görüntüle</a>
    </p>

    <p>Teşekkürler,<br>{{ config('app.name') }}</p>
</div>
