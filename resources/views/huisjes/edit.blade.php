<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huisje Bewerken</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --green:#1a6b4a; --bg:#f0f4f0; --card:#fff; --text:#1a202c; --muted:#718096; --border:#e2e8f0; }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }
        a { text-decoration: none; color: inherit; }

        .nav { background: linear-gradient(135deg, #0f4a33, var(--green));
            padding: .9rem 2rem; display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 16px rgba(0,0,0,.2); }
        .nav-brand { color: #fff; font-size: 1.3rem; font-weight: 800; }
        .nav-back { color: rgba(255,255,255,.85); font-size: .88rem; font-weight: 500;
            padding: .4rem .8rem; border-radius: 8px; transition: background .2s; }
        .nav-back:hover { background: rgba(255,255,255,.15); color: #fff; }

        .page-wrap { max-width: 640px; margin: 3rem auto; padding: 0 1.5rem 4rem; }

        .form-card { background: var(--card); border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,.09); overflow: hidden; }

        .form-header { background: linear-gradient(135deg, #0f4a33, var(--green));
            padding: 2rem 2rem 1.8rem; }
        .form-header h1 { color: #fff; font-size: 1.6rem; font-weight: 800; margin-bottom: .3rem; }
        .form-header p  { color: rgba(255,255,255,.75); font-size: .9rem; }

        .form-body { padding: 2rem; display: flex; flex-direction: column; gap: 1.2rem; }

        /* Huidige foto preview */
        .foto-preview { border-radius: 10px; overflow: hidden; height: 160px; position: relative; background: #c8dfc8; }
        .foto-preview img { width: 100%; height: 100%; object-fit: cover; }
        .foto-preview .no-foto-ph { width: 100%; height: 100%; display: flex; align-items: center;
            justify-content: center; background: linear-gradient(135deg, #a8d5b8, #6db88a);
            color: #fff; font-size: 2.5rem; }

        label { display: block; font-size: .85rem; font-weight: 600; color: var(--text); margin-bottom: .35rem; }
        input, textarea, select {
            width: 100%; padding: .7rem 1rem; border: 1.5px solid var(--border);
            border-radius: 8px; font-size: .9rem; font-family: 'Inter', sans-serif;
            color: var(--text); background: #fff; transition: border-color .2s, box-shadow .2s; }
        input:focus, textarea:focus, select:focus {
            outline: none; border-color: var(--green); box-shadow: 0 0 0 3px rgba(26,107,74,.12); }
        textarea { resize: vertical; min-height: 100px; }

        .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .error-msg { color: #e53e3e; font-size: .8rem; margin-top: .3rem; }

        .btn-submit { display: flex; align-items: center; justify-content: center; gap: .5rem;
            width: 100%; padding: .9rem; background: var(--green); color: #fff;
            border: none; border-radius: 8px; font-size: 1rem; font-weight: 700;
            font-family: 'Inter', sans-serif; cursor: pointer;
            transition: filter .2s, transform .2s; margin-top: .5rem; }
        .btn-submit:hover { filter: brightness(1.12); transform: translateY(-1px); }

        .btn-cancel { display: block; text-align: center; margin-top: .8rem;
            color: var(--muted); font-size: .88rem; }
        .btn-cancel:hover { color: var(--text); }

        @media (max-width: 500px) { .row-2 { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<nav class="nav">
    <span class="nav-brand">🏡 VakantieHuisjes</span>
    <a href="{{ route('huisjes.index') }}" class="nav-back">← Terug naar overzicht</a>
</nav>

<div class="page-wrap">
    <div class="form-card">

        <div class="form-header">
            <h1>✏️ Huisje Bewerken</h1>
            <p>Pas de gegevens van <strong>{{ $huisje->naam }}</strong> aan.</p>
        </div>

        <form class="form-body" method="POST" action="{{ route('huisjes.update', $huisje->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Huidige foto preview --}}
            <div>
                <label>Huidige foto</label>
                <div class="foto-preview">
                    @if($huisje->foto)
                        <img src="{{ asset('storage/' . $huisje->foto) }}" alt="Huidige foto">
                    @else
                        <div class="no-foto-ph">🏡</div>
                    @endif
                </div>
            </div>

            {{-- Nieuwe foto uploaden --}}
            <div>
                <label for="foto">Nieuwe foto uploaden (optioneel)</label>
                <input type="file" id="foto" name="foto" accept="image/*">
                @error('foto') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- Naam --}}
            <div>
                <label for="naam">Naam van het huisje *</label>
                <input type="text" id="naam" name="naam" required
                       value="{{ old('naam', $huisje->naam) }}" placeholder="bijv. Boswachterswoning">
                @error('naam') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- Locatie --}}
            <div>
                <label for="locatie">Locatie</label>
                <input type="text" id="locatie" name="locatie"
                       value="{{ old('locatie', $huisje->locatie) }}" placeholder="bijv. Drenthe, Nederland">
                @error('locatie') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- Prijs + Periode naast elkaar --}}
            <div class="row-2">
                <div>
                    <label for="prijs">Prijs (€) *</label>
                    <input type="number" id="prijs" name="prijs" required min="0" step="0.01"
                           value="{{ old('prijs', $huisje->prijs) }}" placeholder="0.00">
                    @error('prijs') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="periode">Periode</label>
                    <input type="text" id="periode" name="periode"
                           value="{{ old('periode', $huisje->periode) }}" placeholder="bijv. per nacht">
                    @error('periode') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Aantal personen --}}
            <div>
                <label for="aantal">Max. aantal personen *</label>
                <input type="number" id="aantal" name="aantal" required min="1"
                       value="{{ old('aantal', $huisje->aantal) }}" placeholder="bijv. 6">
                @error('aantal') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- Beschrijving --}}
            <div>
                <label for="beschrijving">Beschrijving</label>
                <textarea id="beschrijving" name="beschrijving"
                          placeholder="Omschrijf het huisje...">{{ old('beschrijving', $huisje->beschrijving) }}</textarea>
                @error('beschrijving') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-submit">💾 Wijzigingen opslaan</button>
        </form>

        <a href="{{ route('huisjes.index') }}" class="btn-cancel">Annuleren</a>
    </div>
</div>

</body>
</html>
