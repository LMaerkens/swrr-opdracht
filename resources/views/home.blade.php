<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SRWW</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .btn {
            font-size: 1.05rem;
            padding: 0.75rem 1.25rem;
        }
    </style>


</head>

<body style="background-color:#f4f7fb;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#0d3b66;">

        <div class="container">

            <!-- Logo -->
            <img src="/images/logo.png" width="70" class="me-3">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Stichting SRWW
            </a>

            <!-- Menu -->
            <div>

                <a class="btn btn-outline-light me-2" href="{{ route('huisjes.index') }}">
                    Huisjes
                </a>

                @auth
                    <a class="btn btn-outline-light me-2" href="{{ route('boeking') }}">
                        Boeken
                    </a>

                    <a class="btn btn-warning me-2" href="{{ route('voorwaarden') }}">
                        Voorwaarden
                    </a>

                    <span class="text-white me-2">
                        Welkom, {{ auth()->user()->name }}
                        @if(auth()->user()->rol === 'admin')
                            <span class="badge bg-warning text-dark ms-1">Admin</span>
                        @endif
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Uitloggen
                        </button>
                    </form>
                @else
                    <a class="btn btn-outline-light me-2" href="{{ route('registreer.form') }}">
                        Inschrijven
                    </a>

                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">
                        Inloggen
                    </a>

                    <a class="btn btn-warning" href="{{ route('voorwaarden') }}">
                        Voorwaarden
                    </a>
                @endauth

            </div>

        </div>

    </nav>

    <!-- Hero -->
    <div class="container text-center mt-5">

        <h1 class="display-4 fw-bold mb-4" style="color:#0d3b66;">

            Welkom bij Stichting SRWW

        </h1>

        <p class="lead">

            Stichting Recreatiewoningen Weg &amp; Water verhuurt
            vakantiehuisjes aan leden van de personeelsvereniging.

        </p>

        <p>

            Bekijk eenvoudig de huisjes en schrijf
            digitaal in voor een vakantieperiode.

        </p>

        <a href="{{ route('huisjes.index') }}" class="btn btn-warning btn-lg mt-3">

            Bekijk Huisjes

        </a>

    </div>

    <!-- Info Cards -->
    <div class="container mt-5">

        <div class="row">

            <!-- Card 1 -->
            <div class="col-md-4">

                <div class="card shadow p-4 mb-4 border-0">

                    <h3 style="color:#0d3b66;">
                        6 Vakantiehuisjes
                    </h3>

                    <p>
                        Huisjes op de Waddeneilanden,
                        Drenthe en aan zee.
                    </p>

                </div>

            </div>

            <!-- Card 2 -->
            <div class="col-md-4">

                <div class="card shadow p-4 mb-4 border-0">

                    <h3 style="color:#0d3b66;">
                        Eerlijke Loting
                    </h3>

                    <p>
                        De toewijzing van huisjes gebeurt
                        via een duidelijke loting.
                    </p>

                </div>

            </div>

            <!-- Card 3 -->
            <div class="col-md-4">

                <div class="card shadow p-4 mb-4 border-0">

                    <h3 style="color:#0d3b66;">
                        Digitaal Inschrijven
                    </h3>

                    <p>
                        Geen papieren formulieren meer,
                        alles eenvoudig online geregeld.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Over Stichting -->
    <div class="container mt-5 mb-5">

        <div class="card border-0 shadow p-5">

            <h2 class="mb-4" style="color:#0d3b66;">

                Over Stichting SRWW

            </h2>

            <p>

                Stichting SRWW beheert recreatiewoningen
                voor leden van de personeelsvereniging.
                Het doel is om leden op een eerlijke en
                eenvoudige manier gebruik te laten maken
                van vakantiehuisjes in Nederland.

            </p>

            <p>

                Met deze website kunnen leden zich digitaal
                inschrijven en krijgt het bestuur meer
                overzicht over de verhuur en loting.

            </p>

        </div>

    </div>

    <!-- Footer -->
    <footer class="text-white text-center p-4" style="background-color:#0d3b66;">

        <p class="mb-0">

            &copy; 2026 Stichting SRWW

        </p>

    </footer>

</body>

</html>