<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRWW</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<nav class="nav">
    <a class="nav-brand" href="{{ route('home') }}">
        <img src="/images/logo.png" alt="Stichting SRWW logo" class="nav-logo">
        Stichting SRWW
    </a>
    <div class="nav-links">
        <a href="{{ route('huisjes.index') }}">Huisjes</a>
        @auth
            <a href="{{ route('inschrijving.form') }}">Boeken</a>
            <a href="{{ route('voorwaarden') }}" class="btn btn-accent btn-sm">Voorwaarden</a>
            <span class="nav-welcome">
                Welkom, {{ auth()->user()->name }}
                @if(auth()->user()->rol === 'admin')
                    <span class="badge-admin">Admin</span>
                @endif
            </span>
            <form method="POST" action="{{ route('logout') }}" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('inschrijving.form') }}">Inschrijven</a>
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('voorwaarden') }}" class="btn btn-accent btn-sm">Voorwaarden</a>
        @endauth
    </div>
</nav>

<div class="container home-hero">
    <h1>Welkom bij Stichting SRWW</h1>
    <p class="lead">
        Stichting Recreatiewoningen Weg &amp; Water verhuurt
        vakantiehuisjes aan leden van de personeelsvereniging.
    </p>
    <p>
        Bekijk eenvoudig de huisjes en schrijf
        digitaal in voor een vakantieperiode.
    </p>
    <div class="home-actions">
        <a href="{{ route('huisjes.index') }}" class="btn btn-accent btn-lg">Bekijk Huisjes</a>
        <button id="hoeWerktHetButton" class="btn btn-secondary btn-lg" type="button">Hoe werkt het?</button>
    </div>
</div>

<div class="container">
    <div class="info-cards">
        <div class="info-card">
            <h3>6 Vakantiehuisjes</h3>
            <p>Huisjes op de Waddeneilanden, Drenthe en aan zee.</p>
        </div>
        <div class="info-card">
            <h3>Eerlijke Loting</h3>
            <p>De toewijzing van huisjes gebeurt via een duidelijke loting.</p>
        </div>
        <div class="info-card">
            <h3>Digitaal Inschrijven</h3>
            <p>Geen papieren formulieren meer, alles eenvoudig online geregeld.</p>
        </div>
    </div>
</div>

<div id="hoe-werkt-het" class="container hidden-section mb-5">
    <div class="content-card">
        <h2>Hoe werkt het?</h2>
        <p>
            Kies eerst een vakantieperiode en bekijk de beschikbaarheid van de huisjes.
            Schrijf daarna digitaal in via het formulier met je contactgegevens.
        </p>
        <p>
            Het bestuur verwerkt je inschrijving en de toewijzing gebeurt via een
            eerlijke loting.
            Als je wordt ingeloot, ontvang je een bevestiging en kun je van je vakantiehuisje genieten.
        </p>
    </div>
</div>

<div class="container mb-5">
    <div class="content-card">
        <h2>Over Stichting SRWW</h2>
        <p>
            Stichting SRWW beheert recreatiewoningen
            voor leden van de personeelsvereniging.
            Het doel is om leden op een eerlijke en
            eenvoudige manier gebruik te laten maken
            van vakantiehuisjes in Nederland.
        </p>
        <p>
            Met deze website kunnen leden zich digitaal
            inschrijven en krijgt het bestuur meer
            overzicht over de verhuur en loting.
        </p>
    </div>
</div>

<footer class="site-footer">
    <p>&copy; 2026 Stichting SRWW</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var button = document.getElementById('hoeWerktHetButton');
        var section = document.getElementById('hoe-werkt-het');

        if (button && section) {
            button.addEventListener('click', function () {
                section.classList.add('is-visible');
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        }
    });
</script>
</body>
</html>
