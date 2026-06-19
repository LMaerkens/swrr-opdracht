<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $huisje->naam }} - SRWW</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7fb; }
        .text-primary-dark { color: #0d3b66; }
        .bg-primary-dark { background-color: #0d3b66; }
        .btn-warning-custom { background-color: #ffc107; color: #212529; font-weight: bold; border: none; }
        .btn-warning-custom:hover { background-color: #e0a800; color: #212529; }
        .nav-link { color: rgba(255,255,255,.8) !important; }
        .nav-link:hover { color: #fff !important; }
        .detail-card { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .carousel-item img { height: 400px; object-fit: cover; border-radius: 12px; }
        .price-badge { font-size: 1.5rem; font-weight: bold; color: #0d3b66; background: #e9ecef; padding: 10px 20px; border-radius: 8px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary-dark">
    <div class="container">
        <img src="/images/logo.png" width="50" class="me-3" alt="Logo" onerror="this.style.display='none'">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Stichting SRWW</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('huisjes.index') }}">Huisjes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('boeking') }}">Boeken</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('voorwaarden') }}">Voorwaarden</a></li>
            </ul>
            <div class="d-flex align-items-center">
                @auth
                    <span class="text-white me-3">
                        Welkom, {{ auth()->user()->name }}
                        @if(auth()->user()->rol === 'admin')
                            <span class="badge bg-warning text-dark ms-1">Admin</span>
                        @endif
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light me-2">Inloggen</a>
                    <a href="{{ route('registreer.form') }}" class="btn btn-sm btn-warning-custom">Registreren</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="container my-5">
    <a href="{{ route('huisjes.index') }}" class="btn btn-outline-secondary mb-4"><i class="fas fa-arrow-left"></i> Terug naar overzicht</a>

    <div class="row">
        <!-- Afbeeldingen (links) -->
        <div class="col-lg-7 mb-4">
            <div id="huisjeCarousel" class="carousel slide detail-card overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Hoofdfoto -->
                    <div class="carousel-item active">
                        @if($huisje->foto)
                            <img src="{{ asset('storage/' . $huisje->foto) }}" class="d-block w-100" alt="{{ $huisje->naam }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 400px; font-size: 4rem;">
                                <i class="fas fa-home"></i>
                            </div>
                        @endif
                    </div>
                    <!-- Extra foto's -->
                    @if(is_array($huisje->fotos))
                        @foreach($huisje->fotos as $foto)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $foto) }}" class="d-block w-100" alt="Extra foto">
                            </div>
                        @endforeach
                    @endif
                </div>
                
                @if(is_array($huisje->fotos) && count($huisje->fotos) > 0)
                    <button class="carousel-control-prev" type="button" data-bs-target="#huisjeCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Vorige</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#huisjeCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Volgende</span>
                    </button>
                @endif
            </div>
        </div>

        <!-- Details (rechts) -->
        <div class="col-lg-5">
            <div class="card detail-card p-4 h-100">
                <h1 class="text-primary-dark fw-bold">{{ $huisje->naam }}</h1>
                <p class="text-muted mb-4"><i class="fas fa-map-marker-alt text-danger"></i> {{ $huisje->locatie ?? 'Geen locatie opgegeven' }}</p>
                
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                    <div class="price-badge">
                        €{{ number_format($huisje->prijs, 2, ',', '.') }}
                        <span class="fs-6 fw-normal text-muted d-block">{{ $huisje->periode ?? 'per periode' }}</span>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-users fs-3 text-primary-dark mb-1"></i>
                        <div class="fw-bold">Max. {{ $huisje->aantal }} pers.</div>
                    </div>
                </div>

                <h5 class="fw-bold text-primary-dark mb-3">Beschrijving</h5>
                <p style="line-height: 1.8;">{{ $huisje->beschrijving ?? 'Er is geen beschrijving beschikbaar voor dit huisje.' }}</p>

                <div class="mt-auto pt-4">
                    <a href="{{ route('boeking') }}" class="btn btn-warning-custom btn-lg w-100 mb-3"><i class="fas fa-calendar-check"></i> Boek dit huisje</a>
                    
                    @auth
                        @if(auth()->user()->rol === 'admin')
                            <div class="d-flex gap-2">
                                <a href="{{ route('huisjes.edit', $huisje->id) }}" class="btn btn-outline-primary flex-grow-1"><i class="fas fa-edit"></i> Bewerken</a>
                                <form method="POST" action="{{ route('huisjes.destroy', $huisje->id) }}" class="flex-grow-1" onsubmit="return confirm('Weet je zeker dat je dit huisje wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100"><i class="fas fa-trash"></i> Verwijderen</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
