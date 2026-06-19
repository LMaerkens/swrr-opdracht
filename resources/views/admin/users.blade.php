<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gebruikers beheren - SRWW Admin">
    <title>Gebruikers - Admin SRWW</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="admin-body">

<div class="admin-layout">
    {{-- Sidebar --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <a href="{{ route('home') }}" class="sidebar-brand">
                <span class="sidebar-brand-icon">⚙️</span>
                SRWW Admin
            </a>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link" id="nav-dashboard">
                <span class="sidebar-icon">📊</span>
                Dashboard
            </a>
            <a href="{{ route('admin.inschrijvingen') }}" class="sidebar-link" id="nav-inschrijvingen">
                <span class="sidebar-icon">📋</span>
                Inschrijvingen
            </a>
            <a href="{{ route('huisjes.index') }}" class="sidebar-link" id="nav-huisjes">
                <span class="sidebar-icon">🏡</span>
                Huisjes
            </a>
            <a href="{{ route('admin.users') }}" class="sidebar-link active" id="nav-users">
                <span class="sidebar-icon">👥</span>
                Gebruikers
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="{{ route('home') }}" class="sidebar-link">
                <span class="sidebar-icon">🏠</span>
                Terug naar site
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link sidebar-logout">
                    <span class="sidebar-icon">🚪</span>
                    Uitloggen
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="admin-main">
        <header class="admin-header">
            <button class="sidebar-toggle" id="sidebarToggle" type="button" aria-label="Menu openen">☰</button>
            <div>
                <h1 class="admin-page-title">Gebruikers</h1>
                <p class="admin-page-subtitle">{{ $users->total() }} gebruiker(s) geregistreerd</p>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div class="flash flash-ok">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash flash-err">{{ session('error') }}</div>
            @endif

            {{-- Search Bar --}}
            <div class="admin-toolbar">
                <form method="GET" action="{{ route('admin.users') }}" class="admin-search-form" id="user-search-form">
                    <div class="admin-search-wrap">
                        <span class="admin-search-icon">🔍</span>
                        <input type="text" name="search" value="{{ $search }}"
                               placeholder="Zoek op naam of email..."
                               class="admin-search-input" id="user-search-input">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Zoeken</button>
                    @if($search)
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-sm">Wissen</a>
                    @endif
                </form>
            </div>

            {{-- Table --}}
            @if($users->isEmpty())
                <div class="admin-empty">
                    <div class="admin-empty-icon">👥</div>
                    <h3>Geen gebruikers gevonden</h3>
                    @if($search)
                        <p>Probeer een andere zoekopdracht.</p>
                    @endif
                </div>
            @else
                <div class="admin-table-wrap">
                    <table class="admin-table" id="users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Naam</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Email geverifieerd</th>
                                <th>Geregistreerd op</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr id="user-row-{{ $user->id }}">
                                <td class="td-id">{{ $user->id }}</td>
                                <td>
                                    <strong>{{ $user->name }}</strong>
                                    @if($user->id === auth()->id())
                                        <span class="badge badge-blue">Jij</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->isAdmin())
                                        <span class="badge badge-amber">Admin</span>
                                    @else
                                        <span class="badge badge-gray">Gebruiker</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->email_verified_at)
                                        <span class="badge badge-green">Geverifieerd</span>
                                    @else
                                        <span class="badge badge-red">Niet geverifieerd</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                <td class="td-actions">
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.users.toggleAdmin', $user->id) }}"
                                              onsubmit="return confirm('Wil je de rol van {{ $user->name }} wijzigen?')">
                                            @csrf
                                            @if($user->isAdmin())
                                                <button type="submit" class="btn btn-danger btn-sm" id="demote-{{ $user->id }}">Admin intrekken</button>
                                            @else
                                                <button type="submit" class="btn btn-primary btn-sm" id="promote-{{ $user->id }}">Maak admin</button>
                                            @endif
                                        </form>
                                    @else
                                        <span class="td-muted">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($users->hasPages())
                    <div class="admin-pagination">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                @endif
            @endif
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggle = document.getElementById('sidebarToggle');
        var sidebar = document.getElementById('adminSidebar');
        if (toggle && sidebar) {
            toggle.addEventListener('click', function () {
                sidebar.classList.toggle('open');
            });
        }
    });
</script>
</body>
</html>
