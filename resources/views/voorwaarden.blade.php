<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lees de voorwaarden en het lotingsysteem van Stichting SRWW voor het huren van vakantiehuisjes.">
    <title>Voorwaarden - Stichting SRWW</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #1a6b4a; --green-lt: #2d9b6c; --gold: #f4a825;
            --bg: #f0f4f0; --card: #fff; --text: #1a202c; --muted: #718096;
            --border: #e2e8f0; --radius: 16px; --shadow: 0 4px 20px rgba(0,0,0,.08);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); }
        a { text-decoration: none; color: inherit; }

        /* Navbar */
        .nav {
            background: linear-gradient(135deg, #0f4a33, var(--green));
            padding: .9rem 2rem; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0; z-index: 100;
            box-shadow: 0 2px 16px rgba(0,0,0,.2);
        }
        .nav-brand { color: #fff; font-size: 1.3rem; font-weight: 800; }
        .nav-links { display: flex; align-items: center; gap: .8rem; }
        .nav-links a, .nav-links button {
            color: rgba(255,255,255,.85); font-size: .88rem; font-weight: 500;
            padding: .4rem .8rem; border-radius: 8px; transition: background .2s;
            background: none; border: none; cursor: pointer; font-family: 'Inter', sans-serif;
        }
        .nav-links a:hover, .nav-links button:hover { background: rgba(255,255,255,.15); color: #fff; }
        .btn-logout { background: rgba(229,62,62,.8) !important; color: #fff !important; }

        /* Hero */
        .hero {
            background: linear-gradient(160deg, #0f4a33, var(--green) 55%, #1a8a5a);
            padding: 4.5rem 2rem 3.5rem; text-align: center;
        }
        .hero h1 { color: #fff; font-size: clamp(1.8rem, 5vw, 2.8rem); font-weight: 800;
            letter-spacing: -1px; margin-bottom: .8rem; }
        .hero p { color: rgba(255,255,255,.8); font-size: 1rem; max-width: 560px; margin: 0 auto; }

        /* Container */
        .container { max-width: 860px; margin: 0 auto; padding: 0 1.5rem; }

        /* Sections */
        .content { padding: 3rem 0 4rem; }
        .section { background: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);
            padding: 2rem 2.5rem; margin-bottom: 1.8rem; }
        .section h2 { font-size: 1.3rem; font-weight: 700; color: var(--green);
            margin-bottom: 1rem; display: flex; align-items: center; gap: .5rem; }
        .section p, .section li { color: var(--muted); font-size: .92rem; line-height: 1.8; }
        .section ul { list-style: none; padding: 0; }
        .section ul li { padding: .4rem 0; padding-left: 1.4rem; position: relative; }
        .section ul li::before { content: '✓'; position: absolute; left: 0; color: var(--green); font-weight: 700; }
        .section ol { padding-left: 1.2rem; }
        .section ol li { padding: .4rem 0; }

        .highlight-box {
            background: linear-gradient(135deg, rgba(26,107,74,.08), rgba(45,155,108,.06));
            border-left: 4px solid var(--green); border-radius: 8px;
            padding: 1.2rem 1.5rem; margin: 1rem 0;
        }
        .highlight-box p { color: var(--text); font-weight: 500; }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #0f4a33, var(--green));
            color: rgba(255,255,255,.7); text-align: center; padding: 2rem;
            font-size: .85rem;
        }

        @media (max-width: 640px) {
            .section { padding: 1.5rem; }
            .nav { padding: .8rem 1rem; }
        }
    </style>
</head>
<body>

<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">🏡 Stichting SRWW</a>
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('huisjes.index') }}">Huisjes</a>
        <a href="{{ route('boeking') }}">Boeken</a>
        <a href="{{ route('voorwaarden') }}">Voorwaarden</a>
        @auth
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('registreer.form') }}">Registreer</a>
        @endauth
    </div>
</nav>

<section class="hero">
    <h1>📋 Voorwaarden & Lotingssysteem</h1>
    <p>Alle regels en richtlijnen voor het inschrijven en toewijzen van vakantiehuisjes bij Stichting SRWW.</p>
</section>

<div class="container content">

    {{-- Lidmaatschap --}}
    <div class="section">
        <h2>👤 Lidmaatschap</h2>
        <ul>
            <li>Alleen leden van de personeelsvereniging kunnen gebruik maken van de vakantiehuisjes.</li>
            <li>Lidmaatschap wordt gecontroleerd op basis van uw e-mailadres bij registratie.</li>
            <li>Elk lid mag per seizoen maximaal twee inschrijvingen indienen.</li>
            <li>Het lidmaatschap moet actief zijn op het moment van de loting.</li>
        </ul>
    </div>

    {{-- Inschrijvingsproces --}}
    <div class="section">
        <h2>📝 Inschrijvingsproces</h2>
        <ol>
            <li>Maak een account aan via de <a href="{{ route('registreer.form') }}" style="color:var(--green);font-weight:600;">registratiepagina</a>.</li>
            <li>Bekijk het aanbod op de <a href="{{ route('huisjes.index') }}" style="color:var(--green);font-weight:600;">huisjes-pagina</a>.</li>
            <li>Schrijf u in voor een beschikbare periode via het boekingsformulier.</li>
            <li>Na sluiting van de inschrijving volgt de loting.</li>
        </ol>
        <div class="highlight-box">
            <p>💡 Inschrijvingen zijn vrijblijvend tot na de loting. U betaalt pas wanneer u definitief bent ingeloot.</p>
        </div>
    </div>

    {{-- Loting --}}
    <div class="section">
        <h2>🎲 Lotingssysteem</h2>
        <p>De toewijzing van huisjes geschiedt middels een eerlijke en transparante loting:</p>
        <ul>
            <li>De loting vindt plaats na afloop van de inschrijvingsperiode.</li>
            <li>Leden die in het vorige seizoen niet zijn ingeloot krijgen voorrang.</li>
            <li>Het lotingsresultaat wordt per e-mail gecommuniceerd aan alle deelnemers.</li>
            <li>Bij gelijk lot wordt gekeken naar de datum van inschrijving.</li>
        </ul>
    </div>

    {{-- Huisjesregels --}}
    <div class="section">
        <h2>🏡 Gebruik van het huisje</h2>
        <ul>
            <li>Het huisje dient bij vertrek in dezelfde staat te worden achtergelaten als bij aankomst.</li>
            <li>Huisdieren zijn niet toegestaan, tenzij anders vermeld bij het specifieke huisje.</li>
            <li>Roken is binnen het huisje ten strengste verboden.</li>
            <li>Het maximaal aantal personen zoals vermeld bij het huisje mag niet worden overschreden.</li>
            <li>Schade aan het huisje of inventaris dient direct te worden gemeld aan het bestuur.</li>
        </ul>
    </div>

    {{-- Annulering --}}
    <div class="section">
        <h2>❌ Annulering & Restitutie</h2>
        <ul>
            <li>Kosteloos annuleren is mogelijk tot 4 weken vóór de aanvangsdatum.</li>
            <li>Bij annulering tussen 2 en 4 weken vóór aanvang wordt 50% van de huurprijs in rekening gebracht.</li>
            <li>Bij annulering korter dan 2 weken vóór aanvang is het volledige bedrag verschuldigd.</li>
            <li>Het bestuur kan in bijzondere omstandigheden een uitzondering maken.</li>
        </ul>
    </div>

    {{-- Contact --}}
    <div class="section">
        <h2>📧 Contact</h2>
        <p>Heeft u vragen over de voorwaarden of het lotingssysteem? Neem gerust contact op met het bestuur via:</p>
        <div class="highlight-box">
            <p>✉️ bestuur@srww.nl &nbsp;&nbsp;|&nbsp;&nbsp; 📞 (0)20 - 123 4567</p>
        </div>
    </div>

</div>

<footer class="footer">
    <p>&copy; 2026 Stichting SRWW — Alle rechten voorbehouden</p>
</footer>

</body>
</html>
