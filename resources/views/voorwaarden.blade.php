<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lees de voorwaarden en het lotingsysteem van Stichting SRWW voor het huren van vakantiehuisjes.">
    <title>Voorwaarden - Stichting SRWW</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">Stichting SRWW</a>
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('huisjes.index') }}">Huisjes</a>
        <a href="{{ route('inschrijving.form') }}">Boeken</a>
        <a href="{{ route('voorwaarden') }}">Voorwaarden</a>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('registreer.form') }}">Registreer</a>
        @endauth
    </div>
</nav>

<section class="hero">
    <h1>Voorwaarden &amp; Lotingssysteem</h1>
    <p>Alle regels en richtlijnen voor het inschrijven en toewijzen van vakantiehuisjes bij Stichting SRWW.</p>
</section>

<div class="container content">
    <div class="content-section">
        <h2>Lidmaatschap</h2>
        <ul>
            <li>Alleen leden van de personeelsvereniging kunnen gebruik maken van de vakantiehuisjes.</li>
            <li>Lidmaatschap wordt gecontroleerd op basis van uw e-mailadres bij registratie.</li>
            <li>Elk lid mag per seizoen maximaal twee inschrijvingen indienen.</li>
            <li>Het lidmaatschap moet actief zijn op het moment van de loting.</li>
        </ul>
    </div>

    <div class="content-section">
        <h2>Inschrijvingsproces</h2>
        <ol>
            <li>Maak een account aan via de <a href="{{ route('registreer.form') }}">registratiepagina</a>.</li>
            <li>Bekijk het aanbod op de <a href="{{ route('huisjes.index') }}">huisjes-pagina</a>.</li>
            <li>Schrijf u in voor een beschikbare periode via het boekingsformulier.</li>
            <li>Na sluiting van de inschrijving volgt de loting.</li>
        </ol>
        <div class="highlight-box">
            <p>Inschrijvingen zijn vrijblijvend tot na de loting. U betaalt pas wanneer u definitief bent ingeloot.</p>
        </div>
    </div>

    <div class="content-section">
        <h2>Lotingssysteem</h2>
        <p>De toewijzing van huisjes geschiedt middels een eerlijke en transparante loting:</p>
        <ul>
            <li>De loting vindt plaats na afloop van de inschrijvingsperiode.</li>
            <li>Leden die in het vorige seizoen niet zijn ingeloot krijgen voorrang.</li>
            <li>Het lotingsresultaat wordt per e-mail gecommuniceerd aan alle deelnemers.</li>
            <li>Bij gelijk lot wordt gekeken naar de datum van inschrijving.</li>
        </ul>
    </div>

    <div class="content-section">
        <h2>Gebruik van het huisje</h2>
        <ul>
            <li>Het huisje dient bij vertrek in dezelfde staat te worden achtergelaten als bij aankomst.</li>
            <li>Huisdieren zijn niet toegestaan, tenzij anders vermeld bij het specifieke huisje.</li>
            <li>Roken is binnen het huisje ten strengste verboden.</li>
            <li>Het maximaal aantal personen zoals vermeld bij het huisje mag niet worden overschreden.</li>
            <li>Schade aan het huisje of inventaris dient direct te worden gemeld aan het bestuur.</li>
        </ul>
    </div>

    <div class="content-section">
        <h2>Annulering &amp; Restitutie</h2>
        <ul>
            <li>Kosteloos annuleren is mogelijk tot 4 weken vóór de aanvangsdatum.</li>
            <li>Bij annulering tussen 2 en 4 weken vóór aanvang wordt 50% van de huurprijs in rekening gebracht.</li>
            <li>Bij annulering korter dan 2 weken vóór aanvang is het volledige bedrag verschuldigd.</li>
            <li>Het bestuur kan in bijzondere omstandigheden een uitzondering maken.</li>
        </ul>
    </div>

    <div class="content-section">
        <h2>Contact</h2>
        <p>Heeft u vragen over de voorwaarden of het lotingssysteem? Neem gerust contact op met het bestuur via:</p>
        <div class="highlight-box">
            <p>bestuur@srww.nl &nbsp;|&nbsp; (0)20 - 123 4567</p>
        </div>
    </div>
</div>

<footer class="site-footer">
    <p>&copy; 2026 Stichting SRWW — Alle rechten voorbehouden</p>
</footer>

</body>
</html>
