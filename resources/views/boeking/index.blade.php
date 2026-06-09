<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeking</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">Stichting SRWW</a>
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('huisjes.index') }}">Terug naar huisjes</a>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
        @endauth
    </div>
</nav>

<div class="center-page">
    <div class="icon">📅</div>
    <span class="status-badge">Pagina in aanbouw</span>
    <h1>Boeking</h1>
    <p>
        De boekingspagina wordt nog gebouwd.
        Binnenkort kun je hier eenvoudig een vakantiehuisje reserveren.
    </p>
    <a href="{{ route('huisjes.index') }}" class="btn btn-back">Terug naar huisjes</a>
</div>

</body>
</html>
