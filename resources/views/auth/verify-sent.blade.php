<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bevestig je e-mailadres</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <main>
        <div class="auth-card">
            <div class="auth-header">
                <h1>Verificatie-e-mail verzonden</h1>
                <p>Bijna klaar!</p>
            </div>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <p>We hebben een e-mail naar je inbox verzonden met een verificatielink. Klik op de link in je e-mail om je account te activeren.</p>

            <p style="margin-top: 2rem; margin-bottom: 2rem;"><strong>Ontvangen geen e-mail?</strong> Controleer je spam-folder of probeer opnieuw in te loggen om een nieuwe verificatie-e-mail aan te vragen.</p>

            <div style="margin-top: 2rem; text-align: center;">
                <a href="{{ route('login') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px;">Ga naar inlogpagina</a>
            </div>
        </div>
    </main>
</body>
</html>
