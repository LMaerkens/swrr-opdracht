<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Huisje Toevoegen</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<nav class="nav">
    <span class="nav-brand">Stichting SRWW</span>
    <a href="{{ route('huisjes.index') }}" class="nav-back">Terug naar overzicht</a>
</nav>

<div class="page-wrap">
    <div class="form-card">
        <div class="form-header">
            <h1>Nieuw Huisje Toevoegen</h1>
            <p>Vul de gegevens in om een nieuw vakantiehuisje toe te voegen.</p>
        </div>

        <form class="form-body" method="POST" action="{{ route('huisjes.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="foto">Foto uploaden (optioneel)</label>
                <input type="file" id="foto" name="foto" accept="image/*">
                @error('foto') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="naam">Naam van het huisje *</label>
                <input type="text" id="naam" name="naam" required
                       value="{{ old('naam') }}" placeholder="bijv. Boswachterswoning">
                @error('naam') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="locatie">Locatie</label>
                <input type="text" id="locatie" name="locatie"
                       value="{{ old('locatie') }}" placeholder="bijv. Drenthe, Nederland">
                @error('locatie') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="row-2">
                <div class="form-group">
                    <label for="prijs">Prijs (€) *</label>
                    <input type="number" id="prijs" name="prijs" required min="0" step="0.01"
                           value="{{ old('prijs') }}" placeholder="0.00">
                    @error('prijs') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input type="text" id="periode" name="periode"
                           value="{{ old('periode') }}" placeholder="bijv. per nacht">
                    @error('periode') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="aantal">Max. aantal personen *</label>
                <input type="number" id="aantal" name="aantal" required min="1"
                       value="{{ old('aantal') }}" placeholder="bijv. 6">
                @error('aantal') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea id="beschrijving" name="beschrijving"
                          placeholder="Omschrijf het huisje...">{{ old('beschrijving') }}</textarea>
                @error('beschrijving') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-submit">Huisje toevoegen</button>
        </form>

        <div class="form-card-footer">
            <a href="{{ route('huisjes.index') }}" class="btn-cancel">Annuleren</a>
        </div>
    </div>
</div>

</body>
</html>
