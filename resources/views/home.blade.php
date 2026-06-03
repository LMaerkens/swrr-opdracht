<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>  
    <main class="dashboard-card">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Dashboard</h1>
                <p>Welkom terug, {{ Auth::user()->name }}!</p>
            </div>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="dashboard-user-info">
                <div class="info-row">
                    <span class="info-label">Naam</span>
                    <span class="info-value">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">E-mailadres</span>
                    <span class="info-value">{{ Auth::user()->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Lid sinds</span>
                    <span class="info-value">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d-m-Y H:i') : 'Onbekend' }}</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Uitloggen</button>
            </form>
        </div>
    </main>
</body>
</html>
