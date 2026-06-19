<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huisje Bewerken - SRWW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7fb; }
        .bg-primary-dark { background-color: #0d3b66; }
        .text-primary-dark { color: #0d3b66; }
        .btn-warning-custom { background-color: #ffc107; color: #212529; font-weight: bold; border: none; }
        .btn-warning-custom:hover { background-color: #e0a800; color: #212529; }
        .nav-link { color: rgba(255,255,255,.8) !important; }
        .nav-link:hover { color: #fff !important; }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .img-preview { width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin-right: 10px; border: 1px solid #dee2e6; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('huisjes.index') }}"><i class="fas fa-arrow-left"></i> Terug naar overzicht</a>
    </div>
</nav>

<div class="container my-5" style="max-width: 800px;">
    <div class="card card-custom">
        <div class="card-header bg-primary-dark text-white p-4 text-center rounded-top-3">
            <h2 class="mb-0 fw-bold">Huisje Bewerken</h2>
            <p class="mb-0 mt-2 opacity-75">{{ $huisje->naam }}</p>
        </div>
        <div class="card-body p-4 p-md-5">
            <form method="POST" action="{{ route('huisjes.update', $huisje->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <h5 class="text-primary-dark fw-bold mb-3 border-bottom pb-2">Afbeeldingen</h5>
                
                <div class="mb-4 bg-light p-3 rounded">
                    <label class="form-label fw-bold d-block">Huidige hoofdfoto</label>
                    @if($huisje->foto)
                        <img src="{{ asset('storage/' . $huisje->foto) }}" class="img-preview mb-2" alt="Hoofdfoto">
                    @else
                        <div class="text-muted fst-italic mb-2">Geen hoofdfoto aanwezig.</div>
                    @endif
                    <label for="foto" class="form-label fw-bold mt-2">Nieuwe hoofdfoto uploaden (vervangt huidige)</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    @error('foto') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4 bg-light p-3 rounded">
                    <label class="form-label fw-bold d-block">Huidige extra foto's</label>
                    <div class="d-flex flex-wrap mb-2">
                        @if(is_array($huisje->fotos) && count($huisje->fotos) > 0)
                            @foreach($huisje->fotos as $foto)
                                <img src="{{ asset('storage/' . $foto) }}" class="img-preview mb-2" alt="Extra foto">
                            @endforeach
                        @else
                            <div class="text-muted fst-italic">Geen extra foto's aanwezig.</div>
                        @endif
                    </div>
                    <label for="fotos" class="form-label fw-bold mt-2">Extra foto's TOEVOEGEN (bestaande blijven behouden)</label>
                    <input type="file" class="form-control" id="fotos" name="fotos[]" accept="image/*" multiple>
                    <div class="form-text">Houd Ctrl of Cmd ingedrukt om meerdere foto's te selecteren.</div>
                    @error('fotos.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <h5 class="text-primary-dark fw-bold mb-3 border-bottom pb-2 mt-4">Algemene Gegevens</h5>

                <div class="mb-3">
                    <label for="naam" class="form-label fw-bold">Naam van het huisje *</label>
                    <input type="text" class="form-control" id="naam" name="naam" required value="{{ old('naam', $huisje->naam) }}">
                    @error('naam') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="locatie" class="form-label fw-bold">Locatie</label>
                    <input type="text" class="form-control" id="locatie" name="locatie" value="{{ old('locatie', $huisje->locatie) }}">
                    @error('locatie') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="prijs" class="form-label fw-bold">Prijs (€) *</label>
                        <input type="number" class="form-control" id="prijs" name="prijs" required min="0" step="0.01" value="{{ old('prijs', $huisje->prijs) }}">
                        @error('prijs') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="periode" class="form-label fw-bold">Periode</label>
                        <input type="text" class="form-control" id="periode" name="periode" value="{{ old('periode', $huisje->periode) }}">
                        @error('periode') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="aantal" class="form-label fw-bold">Max. aantal personen *</label>
                    <input type="number" class="form-control" id="aantal" name="aantal" required min="1" value="{{ old('aantal', $huisje->aantal) }}">
                    @error('aantal') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label for="beschrijving" class="form-label fw-bold">Beschrijving</label>
                    <textarea class="form-control" id="beschrijving" name="beschrijving" rows="5">{{ old('beschrijving', $huisje->beschrijving) }}</textarea>
                    @error('beschrijving') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning-custom btn-lg"><i class="fas fa-save"></i> Wijzigingen Opslaan</button>
                    <a href="{{ route('huisjes.index') }}" class="btn btn-light text-muted">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
