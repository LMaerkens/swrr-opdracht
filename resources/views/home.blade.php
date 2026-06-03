<!DOCTYPE html>
<html lang="nl">
 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SRWW</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        .btn {
            font-size: 1.05rem;
            padding: 0.75rem 1.25rem;
        }
    </style>

</head>

<body style="background-color:#f4f7fb;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background-color:#0d3b66;">

        <div class="container">

            <!-- Logo -->
            <img
                src="/images/logo.png"
                width="70"
                class="me-3">

            <a class="navbar-brand fw-bold" href="/">
                Stichting SRWW
            </a>

            <!-- Menu -->
            <div>

                <a class="btn btn-outline-light me-2"
                    href="/huisjes">

                    Huisjes

                </a>

                <a class="btn btn-outline-light me-2"
                    href="/registreer">

                    Inschrijven

                </a>

                <a class="btn btn-warning"
                    href="/voorwaarden">

                    Voorwaarden

                </a>

            </div>

        </div>

    </nav>

    <!-- Hero -->
    <div class="container text-center mt-5">

        <h1 class="display-4 fw-bold mb-4"
            style="color:#0d3b66;">

            Welkom bij Stichting SRWW

        </h1>

        <p class="lead">

            Stichting Recreatiewoningen Weg & Water verhuurt
            vakantiehuisjes aan leden van de personeelsvereniging.

        </p>

        <p>

            Bekijk eenvoudig de huisjes en schrijf
            digitaal in voor een vakantieperiode.

        </p>

        <div class="d-flex justify-content-center gap-2 mt-3">
            <a href="/huisjes"
                class="btn btn-warning btn-lg">

                Bekijk Huisjes

            </a>

            <button id="hoeWerktHetButton"
                class="btn btn-outline-primary btn-lg"
                type="button">

                Hoe werkt het?

            </button>
        </div>

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

    <!-- Hoe werkt het -->
    <div id="hoe-werkt-het" class="container mt-5" style="display:none;">

        <div class="card border-0 shadow p-5">

            <h2 class="mb-4" style="color:#0d3b66;">

                Hoe werkt het?

            </h2>

            <p>
                Kies eerst een vakantieperiode en bekijk de beschikbaarheid van de huisjes.
                Schrijf daarna digitaal in via het formulier met je contactgegevens.
            </p>

            <p>
                Het bestuur verwerkt je inschrijving en de toewijzing gebeurt via een
                eerlijke loting.
                Als je wordt ingeloot, ontvang je een bevestiging en kun je van je vakantiehuisje genieten.
            </p>

        </div>

    </div>

    <!-- Over Stichting -->
    <div class="container mt-5 mb-5">

        <div class="card border-0 shadow p-5">

            <h2 class="mb-4"
                style="color:#0d3b66;">

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
    <footer class="text-white text-center p-4"
        style="background-color:#0d3b66;">

        <p class="mb-0">

            © 2026 Stichting SRWW

        </p>

    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var button = document.getElementById('hoeWerktHetButton');
            var section = document.getElementById('hoe-werkt-het');

            if (button && section) {
                button.addEventListener('click', function () {
                    if (section.style.display === 'none' || section.style.display === '') {
                        section.style.display = 'block';
                        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            }
        });
    </script>
</body>

</html>