<div style="font-family: sans-serif; font-size: 14px; color: #1e293b;">
    <h2>Başvurunuz Alınmıştır</h2>

    <p>Sayın {{ $application->first_name }} {{ $application->last_name }},</p>

    <p>Üyelik başvurunuzu aldık. Başvurunuz incelendikten sonra sizinle iletişime geçeceğiz.</p>

    <p>Teşekkürler,<br>{{ config('app.name') }}</p>
</div>
