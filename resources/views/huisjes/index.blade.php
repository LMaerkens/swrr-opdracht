<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ontdek onze prachtige vakantiehuisjes en boek direct online.">
    <title>Onze Huisjes</title>
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
            @if(auth()->user()->rol === 'admin')
                <span class="badge-admin">Admin</span>
                <a href="{{ route('huisjes.create') }}" class="btn btn-accent btn-sm">+ Toevoegen</a>
            @endif
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
    <h1>Onze vakantiehuisjes</h1>
    <p>Bekijk alle beschikbare huisjes en schrijf u in voor een vakantieperiode.</p>
    <div class="hero-stats">
        <div class="stat"><strong>{{ $huisjes->count() }}</strong><span>Beschikbare huisjes</span></div>
    </div>
</section>

<div class="container">
    @if(session('succes'))
        <div class="flash flash-ok">{{ session('succes') }}</div>
    @endif
    @if(session('error'))
        <div class="flash flash-err">{{ session('error') }}</div>
    @endif

    <div class="top-bar">
        <h2 class="page-heading">Onze Huisjes
            <small>({{ $huisjes->count() }} beschikbaar)</small>
        </h2>
        @auth
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('huisjes.create') }}" class="btn btn-primary btn-sm">+ Nieuw huisje</a>
            @endif
        @endauth
    </div>

    @if($huisjes->isEmpty())
        <div class="empty-state">
            <div class="ico">🏕️</div>
            <h2>Nog geen huisjes beschikbaar</h2>
            <p>Kom later terug of voeg als admin een huisje toe.</p>
        </div>
    @else
        <div class="card-grid">
            @foreach($huisjes as $huisje)
            <article class="card huisje-card" id="huisje-{{ $huisje->id }}">
                <div class="foto-wrap">
                    @if($huisje->foto)
                        <img src="{{ asset('storage/' . $huisje->foto) }}"
                             alt="Foto van {{ $huisje->naam }}" loading="lazy">
                    @else
                        <div class="no-foto">🏡<span>{{ $huisje->naam }}</span></div>
                    @endif

                    @if($huisje->locatie)
                        <span class="loc-badge">{{ $huisje->locatie }}</span>
                    @endif

                    @auth
                        @if(auth()->user()->rol === 'admin')
                        <div class="admin-btns">
                            <a href="{{ route('huisjes.edit', $huisje->id) }}"
                               class="btn btn-secondary btn-sm">Bewerken</a>
                            <form method="POST" action="{{ route('huisjes.destroy', $huisje->id) }}"
                                  onsubmit="return confirm('{{ $huisje->naam }} verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </div>
                        @endif
                    @endauth
                </div>

                <div class="huisje-body">
                    <h3 class="huisje-naam">{{ $huisje->naam }}</h3>
                    <p class="huisje-desc">{{ $huisje->beschrijving ?? 'Geen beschrijving beschikbaar.' }}</p>
                    <div class="huisje-meta">
                        <div class="huisje-personen">Max. {{ $huisje->aantal }} {{ $huisje->aantal == 1 ? 'persoon' : 'personen' }}</div>
                        <div class="prijs-blok">
                            <span class="prijs">€{{ number_format($huisje->prijs, 2, ',', '.') }}</span>
                            @if($huisje->periode)
                                <span class="periode">{{ $huisje->periode }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="huisje-footer">
                    <a href="{{ route('inschrijving.form') }}" class="btn btn-accent btn-block" id="boek-{{ $huisje->id }}">
                        Boek nu
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    @endif
</div>

<footer class="site-footer">
    <p>&copy; 2026 Stichting SRWW</p>
</footer>

</body>
</html>
