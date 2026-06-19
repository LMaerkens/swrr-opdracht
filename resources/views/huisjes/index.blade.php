<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ontdek onze prachtige vakantiehuisjes en boek direct online.">
    <title>Onze Huisjes - SRWW</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7fb; }
        .bg-primary-dark { background-color: #0d3b66; }
        .text-primary-dark { color: #0d3b66; }
        .btn-warning-custom { background-color: #ffc107; color: #212529; font-weight: bold; border: none; }
        .btn-warning-custom:hover { background-color: #e0a800; color: #212529; }
        .nav-link { color: rgba(255,255,255,.8) !important; }
        .nav-link:hover { color: #fff !important; }
        .hero { background: linear-gradient(135deg, #0d3b66, #1a5b99); color: white; padding: 4rem 0; text-align: center; }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s ease; height: 100%; display: flex; flex-direction: column; }
        .card-custom:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .card-img-top { height: 200px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px; }
        .card-body-custom { padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; }
        .price-text { font-size: 1.25rem; font-weight: bold; color: #0d3b66; }
        .location-badge { position: absolute; top: 10px; left: 10px; background: rgba(13, 59, 102, 0.8); color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.85rem; }
        .admin-controls { position: absolute; top: 10px; right: 10px; display: flex; gap: 5px; }
        .card-link { text-decoration: none; color: inherit; display: block; height: 100%; }
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

<!-- Hero -->
<div class="hero">
    <div class="container">
        <h1 class="fw-bold mb-3">Onze Vakantiehuisjes</h1>
        <p class="lead mb-0">Vind uw perfecte bestemming voor een ontspannen verblijf.</p>
    </div>
</div>

<div class="container my-5">
    
    @if(session('succes'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('succes') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary-dark fw-bold">Beschikbare Huisjes ({{ $huisjes->count() }})</h2>
        @auth
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('huisjes.create') }}" class="btn btn-warning-custom"><i class="fas fa-plus"></i> Nieuw huisje toevoegen</a>
            @endif
        @endauth
    </div>

    @if($huisjes->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-home fa-4x text-muted mb-3"></i>
            <h3>Nog geen huisjes beschikbaar</h3>
            <p class="text-muted">Er zijn momenteel geen huisjes om weer te geven.</p>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($huisjes as $huisje)
                <div class="col">
                    <div class="card card-custom position-relative">
                        <a href="{{ route('huisjes.show', $huisje->id) }}" class="card-link">
                            @if($huisje->foto)
                                <img src="{{ asset('storage/' . $huisje->foto) }}" class="card-img-top" alt="{{ $huisje->naam }}">
                            @else
                                <div class="bg-secondary text-white d-flex justify-content-center align-items-center card-img-top" style="font-size: 3rem;">
                                    <i class="fas fa-home"></i>
                                </div>
                            @endif
                            
                            @if($huisje->locatie)
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> {{ $huisje->locatie }}</span>
                            @endif
                        </a>

                        @auth
                            @if(auth()->user()->rol === 'admin')
                                <div class="admin-controls">
                                    <a href="{{ route('huisjes.edit', $huisje->id) }}" class="btn btn-sm btn-light shadow-sm" title="Bewerken"><i class="fas fa-edit text-primary"></i></a>
                                    <form method="POST" action="{{ route('huisjes.destroy', $huisje->id) }}" onsubmit="return confirm('Weet je zeker dat je dit huisje wilt verwijderen?');" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light shadow-sm" title="Verwijderen"><i class="fas fa-trash text-danger"></i></button>
                                    </form>
                                </div>
                            @endif
                        @endauth

                        <div class="card-body-custom">
                            <a href="{{ route('huisjes.show', $huisje->id) }}" class="card-link" style="flex-grow:1;">
                                <h5 class="card-title fw-bold text-primary-dark">{{ $huisje->naam }}</h5>
                                <p class="card-text text-muted mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $huisje->beschrijving ?? 'Geen beschrijving beschikbaar.' }}
                                </p>
                            </a>
                            
                            <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-users text-muted"></i> <span class="text-muted small">Max {{ $huisje->aantal }} pers.</span>
                                </div>
                                <div class="text-end">
                                    <div class="price-text">€{{ number_format($huisje->prijs, 2, ',', '.') }}</div>
                                    @if($huisje->periode)
                                        <div class="small text-muted">{{ $huisje->periode }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
