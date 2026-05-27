<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registreer</title>
    <link rel="stylesheet" href="/css/app.css">
 </head>
<body>
    <main style="padding:2rem;">
        <h1>Registreer</h1>
        <form method="POST" action="/register">
            @csrf
            <div>
                <label for="name">Naam</label>
                <input id="name" name="name" required>
            </div>
            <div>
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" required>
            </div>
            <div>
                <label for="password">Wachtwoord</label>
                <input id="password" name="password" type="password" required>
            </div>
            <button type="submit">Registreer</button>
        </form>
    </main>
</body>
</html>