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
                <h1>Bevestig je e-mailadres</h1>
                <p>Bedankt voor je registratie!</p>
            </div>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <p>Controleer je e-mail voor een verificatielink. Als je de e-mail niet hebt ontvangen, kun je hieronder een nieuwe aanvragen.</p>

            <form method="POST" action="{{ route('verification.send') }}" style="margin-top: 2rem;">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 100%;">Stuur verificatie-e-mail opnieuw</button>
            </form>

            <div style="margin-top: 1rem; text-align: center;">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </main>
</body>
</html>
