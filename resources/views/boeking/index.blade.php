<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeking</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --green:#1a6b4a; --gold:#f4a825; --bg:#f0f4f0; }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--bg); min-height: 100vh; }
        a { text-decoration: none; color: inherit; }

        .nav { background: linear-gradient(135deg, #0f4a33, var(--green));
            padding: .9rem 2rem; display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 16px rgba(0,0,0,.2); }
        .nav-brand { color: #fff; font-size: 1.3rem; font-weight: 800; }
        .nav-back { color: rgba(255,255,255,.85); font-size: .88rem; font-weight: 500;
            padding: .4rem .8rem; border-radius: 8px; transition: background .2s; }
        .nav-back:hover { background: rgba(255,255,255,.15); color: #fff; }

        .center { display: flex; flex-direction: column; align-items: center;
            justify-content: center; min-height: calc(100vh - 60px); text-align: center; padding: 2rem; }
        .icon { font-size: 5rem; margin-bottom: 1.5rem; animation: bounce 2s infinite; }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-12px); }
        }
        h1 { font-size: 2.2rem; font-weight: 800; color: #1a202c; margin-bottom: .6rem; }
        p  { color: #718096; font-size: 1rem; max-width: 420px; margin-bottom: 2rem; line-height: 1.7; }
        .badge { background: var(--gold); color: #1a202c; padding: .5rem 1.2rem;
            border-radius: 99px; font-weight: 700; font-size: .85rem; display: inline-block; margin-bottom: 2rem; }
        .btn-back { background: var(--green); color: #fff; padding: .75rem 1.8rem;
            border-radius: 8px; font-weight: 700; font-size: .95rem;
            transition: filter .2s, transform .2s; display: inline-flex; align-items: center; gap: .4rem; }
        .btn-back:hover { filter: brightness(1.1); transform: translateY(-2px); }
    </style>
</head>
<body>

<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">🏡 Stichting SRWW</a>
    <div style="display:flex;align-items:center;gap:.8rem;">
        <a href="{{ route('home') }}" class="nav-back">Home</a>
        <a href="{{ route('huisjes.index') }}" class="nav-back">← Terug naar huisjes</a>
        @auth
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="nav-back" style="background:rgba(255,255,255,.15);border:none;cursor:pointer;font-family:'Inter',sans-serif;">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="nav-back">Inloggen</a>
        @endauth
    </div>
</nav>

<div class="center">
    <div class="icon">📅</div>
    <span class="badge">🚧 Pagina in aanbouw</span>
    <h1>Boeking</h1>
    <p>
        De boekingspagina wordt nog gebouwd.
        Binnenkort kun je hier eenvoudig een vakantiehuisje reserveren.
    </p>
    <a href="{{ route('huisjes.index') }}" class="btn-back">← Terug naar huisjes</a>
</div>

</body>
</html>
