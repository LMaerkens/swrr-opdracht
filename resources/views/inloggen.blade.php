<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggen</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>  
    <main>
        <div class="auth-card">
            <div class="auth-header">
                <h1>Inloggen</h1>
                <p>Welkom terug! Log in op uw account</p>
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
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">E-mailadres</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}" placeholder="bijvoorbeeld@domein.nl">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input id="password" name="password" type="password" required placeholder="Uw wachtwoord">
                </div>
                <label class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <span>Onthoud mij</span>
                </label>
                <button type="submit">Inloggen</button>
            </form>

            <div class="auth-footer">
                <p>Nog geen account? <a href="{{ route('registreer.form') }}">Registreer</a></p>
            </div>
        </div>
    </main>
</body>
</html>
