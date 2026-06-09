<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registreer</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="auth-page">
    <main>
        <div class="auth-card">
            <div class="auth-header">
                <h1>Registreer</h1>
                <p>Maak een nieuw account aan</p>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Er zijn fouten in het formulier:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('registreer.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input id="name" name="name" required value="{{ old('name') }}" placeholder="Uw volledige naam">
                </div>
                <div class="form-group">
                    <label for="email">E-mailadres</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}" placeholder="bijvoorbeeld@domein.nl">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input id="password" name="password" type="password" required placeholder="Minimaal 8 tekens">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Bevestig Wachtwoord</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Herhaal uw wachtwoord">
                </div>
                <button type="submit">Registreer</button>
            </form>

            <div class="auth-footer">
                <p>Heb je al een account? <a href="{{ route('login') }}">Log in</a></p>
            </div>
        </div>
    </main>
</body>
</html>