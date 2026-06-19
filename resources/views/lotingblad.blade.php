<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotingblad - SRWW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f4f7fb;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#0d3b66;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Stichting SRWW</a>
            <div>
                <a class="btn btn-outline-light me-2" href="{{ route('huisjes.index') }}">Huisjes</a>
                <a class="btn btn-outline-light me-2" href="{{ route('inschrijving.form') }}">Inschrijven</a>
                <a class="btn btn-warning" href="{{ route('voorwaarden') }}">Voorwaarden</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-0">Lotingblad</h1>
                <p class="mb-0 text-muted">Bekijk hier alle inschrijvingen en trek een willekeurige set winnaars.</p>
            </div>
            <div>
                <a href="{{ route('lotingblad', ['draw' => 1]) }}" class="btn btn-success me-2">Trek winnaars</a>
                <a href="{{ route('home') }}" class="btn btn-primary">Terug naar home</a>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Inschrijvingen ({{ $inschrijvingen->count() }})</h5>

                        @if($inschrijvingen->isEmpty())
                            <p class="text-muted">Er zijn nog geen inschrijvingen.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Email</th>
                                            <th>Huisje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inschrijvingen as $inschrijving)
                                            <tr>
                                                <td>{{ $inschrijving->naam }}</td>
                                                <td>{{ $inschrijving->email }}</td>
                                                <td>{{ $inschrijving->huisje ?? 'Niet gekozen' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Winnende deelnemers</h5>

                        @if($winners)
                            @if($winners->isEmpty())
                                <p class="text-muted">Klik op "Trek winnaars" om willekeurige winnaars te selecteren.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Naam</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($winners as $index => $winner)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $winner->naam }}</td>
                                                    <td>{{ $winner->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
