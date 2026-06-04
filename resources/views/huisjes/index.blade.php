<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ontdek onze prachtige vakantiehuisjes en boek direct online.">
    <title>Onze Huisjes</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #1a6b4a; --green-lt: #2d9b6c; --gold: #f4a825;
            --red: #e53e3e;   --blue: #3182ce;     --bg: #f0f4f0;
            --card: #fff;     --text: #1a202c;     --muted: #718096;
            --border: #e2e8f0; --radius: 16px;     --shadow: 0 4px 20px rgba(0,0,0,.08);
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
        .nav-brand { color: #fff; font-size: 1.3rem; font-weight: 800; display: flex; align-items: center; gap: .5rem; }
        .nav-links { display: flex; align-items: center; gap: .8rem; }
        .nav-links a { color: rgba(255,255,255,.85); font-size: .88rem; font-weight: 500;
            padding: .4rem .8rem; border-radius: 8px; transition: background .2s; }
        .nav-links a:hover { background: rgba(255,255,255,.15); color: #fff; }
        .badge-admin { background: var(--gold); color: #000; font-size: .7rem; font-weight: 700;
            padding: .2rem .6rem; border-radius: 99px; text-transform: uppercase; }

        /* Hero */
        .hero { background: linear-gradient(160deg, #0f4a33, var(--green) 55%, #1a8a5a);
            padding: 4.5rem 2rem 3.5rem; text-align: center; position: relative; overflow: hidden; }
        .hero h1 { color: #fff; font-size: clamp(1.8rem, 5vw, 3rem); font-weight: 800;
            letter-spacing: -1px; margin-bottom: .8rem; }
        .hero p { color: rgba(255,255,255,.8); font-size: 1rem; max-width: 480px; margin: 0 auto 2rem; }
        .hero-stats { display: flex; justify-content: center; gap: 2.5rem; flex-wrap: wrap; }
        .stat { color: #fff; text-align: center; }
        .stat strong { display: block; font-size: 1.8rem; font-weight: 800; line-height: 1; }
        .stat span { font-size: .75rem; color: rgba(255,255,255,.7); text-transform: uppercase; letter-spacing: .5px; }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }

        /* Flash */
        .flash { padding: .9rem 1.2rem; border-radius: 8px; margin: 1.5rem 0;
            font-weight: 500; display: flex; align-items: center; gap: .5rem; }
        .flash-ok  { background: #c6f6d5; color: #276749; border-left: 4px solid #38a169; }
        .flash-err { background: #fed7d7; color: #9b2c2c; border-left: 4px solid var(--red); }

        /* Admin bar */
        .top-bar { display: flex; align-items: center; justify-content: space-between;
            padding: 1.5rem 0; flex-wrap: wrap; gap: 1rem; }
        .section-title { font-size: 1.4rem; font-weight: 700; }
        .section-title em { color: var(--green); font-style: normal; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: .4rem; padding: .6rem 1.1rem;
            border-radius: 8px; font-weight: 600; font-size: .88rem; cursor: pointer;
            border: none; font-family: 'Inter', sans-serif;
            transition: filter .2s, transform .2s, box-shadow .2s; }
        .btn:hover { filter: brightness(1.1); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,.15); }
        .btn-green  { background: var(--green); color: #fff; }
        .btn-blue   { background: var(--blue);  color: #fff; padding: .4rem .85rem; font-size: .78rem; }
        .btn-red    { background: var(--red);   color: #fff; padding: .4rem .85rem; font-size: .78rem; }
        .btn-gold   { background: var(--gold);  color: #1a202c; font-weight: 700;
            padding: .8rem 1.4rem; font-size: .95rem; width: 100%; justify-content: center; }

        /* Grid */
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.8rem; padding-bottom: 4rem; }

        /* Card */
        .card { background: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);
            overflow: hidden; display: flex; flex-direction: column; position: relative;
            transition: transform .25s, box-shadow .25s; }
        .card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(0,0,0,.14); }

        /* Foto */
        .foto-wrap { position: relative; height: 210px; background: #c8dfc8; overflow: hidden; }
        .foto-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s; }
        .card:hover .foto-wrap img { transform: scale(1.05); }
        .no-foto { width: 100%; height: 100%; display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            background: linear-gradient(135deg, #a8d5b8, #6db88a);
            color: #fff; font-size: 3.2rem; gap: .4rem; }
        .no-foto span { font-size: .88rem; font-weight: 600; opacity: .9; }

        /* Badges op foto */
        .loc-badge { position: absolute; top: 12px; left: 12px;
            background: rgba(0,0,0,.55); backdrop-filter: blur(4px);
            color: #fff; font-size: .76rem; font-weight: 600;
            padding: .3rem .7rem; border-radius: 99px; }
        .admin-btns { position: absolute; top: 12px; right: 12px; display: flex; flex-direction: column; gap: .4rem; }

        /* Card body */
        .body { padding: 1.3rem; flex: 1; display: flex; flex-direction: column; gap: .6rem; }
        .naam { font-size: 1.15rem; font-weight: 700; }
        .desc { color: var(--muted); font-size: .85rem; line-height: 1.6;
            display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .meta { display: flex; align-items: center; justify-content: space-between;
            margin-top: auto; padding-top: .8rem; border-top: 1px solid var(--border); }
        .personen { color: var(--muted); font-size: .84rem; font-weight: 500;
            display: flex; align-items: center; gap: .3rem; }
        .prijs-blok { text-align: right; }
        .prijs-blok .prijs { font-size: 1.25rem; font-weight: 800; color: var(--green); }
        .prijs-blok .periode { font-size: .73rem; color: var(--muted); display: block; }
        .footer { padding: 0 1.3rem 1.3rem; }

        /* Empty */
        .empty { text-align: center; padding: 5rem 2rem; color: var(--muted); }
        .empty .ico { font-size: 4rem; margin-bottom: 1rem; }
        .empty h2 { color: var(--text); font-size: 1.4rem; margin-bottom: .4rem; }

        @media (max-width: 640px) {
            .grid { grid-template-columns: 1fr; }
            .hero { padding: 3rem 1rem 2.5rem; }
            .nav  { padding: .8rem 1rem; }
        }
    </style>
</head>
<body>

{{-- Navigatie --}}
<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">🏡 Stichting SRWW</a>
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('huisjes.index') }}">Huisjes</a>
        <a href="{{ route('boeking') }}">Boeken</a>
        <a href="{{ route('voorwaarden') }}">Voorwaarden</a>
        @auth
            @if(auth()->user()->rol === 'admin')
                <span class="badge-admin">Admin</span>
                <a href="{{ route('huisjes.create') }}" class="btn btn-green">+ Toevoegen</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="btn btn-green" style="background:#e53e3e;">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('registreer.form') }}">Registreer</a>
        @endauth
    </div>
</nav>

{{-- Hero --}}
<section class="hero">
    <h1>Jouw perfecte vakantiehuisje wacht</h1>
    <p>Ontdek unieke verblijven midden in de natuur. Van romantische cottages tot grote gezinshuisjes.</p>
    <div class="hero-stats">
        <div class="stat"><strong>{{ $huisjes->count() }}</strong><span>Beschikbare huisjes</span></div>
        <div class="stat"><strong>⭐ 4.9</strong><span>Beoordeling</span></div>
        <div class="stat"><strong>100%</strong><span>Tevredenheid</span></div>
    </div>
</section>

{{-- Inhoud --}}
<div class="container">

    {{-- Flash meldingen --}}
    @if(session('succes'))
        <div class="flash flash-ok">✅ {{ session('succes') }}</div>
    @endif
    @if(session('error'))
        <div class="flash flash-err">❌ {{ session('error') }}</div>
    @endif

    {{-- Titelbalk --}}
    <div class="top-bar">
        <h2 class="section-title">Onze <em>Huisjes</em>
            <small style="font-size:.85rem;color:var(--muted);font-weight:400;margin-left:.4rem">
                ({{ $huisjes->count() }} beschikbaar)
            </small>
        </h2>
        @auth
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('huisjes.create') }}" class="btn btn-green">＋ Nieuw huisje</a>
            @endif
        @endauth
    </div>

    {{-- Grid / Lege staat --}}
    @if($huisjes->isEmpty())
        <div class="empty">
            <div class="ico">🏕️</div>
            <h2>Nog geen huisjes beschikbaar</h2>
            <p>Kom later terug of voeg als admin een huisje toe.</p>
        </div>
    @else
        <div class="grid">
            @foreach($huisjes as $huisje)
            <article class="card" id="huisje-{{ $huisje->id }}">

                {{-- Foto --}}
                <div class="foto-wrap">
                    @if($huisje->foto)
                        <img src="{{ asset('storage/' . $huisje->foto) }}"
                             alt="Foto van {{ $huisje->naam }}" loading="lazy">
                    @else
                        <div class="no-foto">🏡<span>{{ $huisje->naam }}</span></div>
                    @endif

                    {{-- Locatie badge --}}
                    @if($huisje->locatie)
                        <span class="loc-badge">📍 {{ $huisje->locatie }}</span>
                    @endif

                    {{-- Admin: bewerken & verwijderen --}}
                    @auth
                        @if(auth()->user()->rol === 'admin')
                        <div class="admin-btns">
                            <a href="{{ route('huisjes.edit', $huisje->id) }}"
                               class="btn btn-blue">✏️ Bewerken</a>

                            <form method="POST" action="{{ route('huisjes.destroy', $huisje->id) }}"
                                  onsubmit="return confirm('{{ $huisje->naam }} verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-red">🗑️ Verwijderen</button>
                            </form>
                        </div>
                        @endif
                    @endauth
                </div>

                {{-- Kaart inhoud --}}
                <div class="body">
                    <h3 class="naam">{{ $huisje->naam }}</h3>
                    <p class="desc">{{ $huisje->beschrijving ?? 'Geen beschrijving beschikbaar.' }}</p>
                    <div class="meta">
                        <div class="personen">👥 Max. {{ $huisje->aantal }} {{ $huisje->aantal == 1 ? 'persoon' : 'personen' }}</div>
                        <div class="prijs-blok">
                            <span class="prijs">€{{ number_format($huisje->prijs, 2, ',', '.') }}</span>
                            @if($huisje->periode)
                                <span class="periode">{{ $huisje->periode }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Boek knop → /boeking --}}
                <div class="footer">
                    <a href="{{ url('/boeking') }}" class="btn btn-gold" id="boek-{{ $huisje->id }}">
                        📅 Boek nu
                    </a>
                </div>

            </article>
            @endforeach
        </div>
    @endif

</div>
</body>
</html>
