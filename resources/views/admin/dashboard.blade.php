<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin dashboard - Stichting SRWW beheer">
    <title>Admin Dashboard - SRWW</title>
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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link active" id="nav-dashboard">
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
            <a href="{{ route('admin.users') }}" class="sidebar-link" id="nav-users">
                <span class="sidebar-icon">👥</span>
                Gebruikers
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <span class="sidebar-user-icon">👤</span>
                <div>
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
            </div>
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
                <h1 class="admin-page-title">Dashboard</h1>
                <p class="admin-page-subtitle">Overzicht van je SRWW beheer</p>
            </div>
            <div class="admin-header-actions">
                <span class="admin-date">{{ now()->translatedFormat('l j F Y') }}</span>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div class="flash flash-ok">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash flash-err">{{ session('error') }}</div>
            @endif

            {{-- Stat Cards --}}
            <div class="admin-stats">
                <a href="{{ route('admin.inschrijvingen') }}" class="stat-card" id="stat-inschrijvingen">
                    <div class="stat-card-icon stat-icon-blue">📋</div>
                    <div class="stat-card-info">
                        <span class="stat-card-value">{{ $stats['inschrijvingen'] }}</span>
                        <span class="stat-card-label">Inschrijvingen</span>
                    </div>
                </a>
                <a href="{{ route('huisjes.index') }}" class="stat-card" id="stat-huisjes">
                    <div class="stat-card-icon stat-icon-green">🏡</div>
                    <div class="stat-card-info">
                        <span class="stat-card-value">{{ $stats['huisjes'] }}</span>
                        <span class="stat-card-label">Huisjes</span>
                    </div>
                </a>
                <a href="{{ route('admin.users') }}" class="stat-card" id="stat-users">
                    <div class="stat-card-icon stat-icon-purple">👥</div>
                    <div class="stat-card-info">
                        <span class="stat-card-value">{{ $stats['users'] }}</span>
                        <span class="stat-card-label">Gebruikers</span>
                    </div>
                </a>
                <div class="stat-card" id="stat-admins">
                    <div class="stat-card-icon stat-icon-amber">🛡️</div>
                    <div class="stat-card-info">
                        <span class="stat-card-value">{{ $stats['admins'] }}</span>
                        <span class="stat-card-label">Admins</span>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="admin-section">
                <h2 class="admin-section-title">Snelle acties</h2>
                <div class="quick-actions">
                    <a href="{{ route('admin.inschrijvingen') }}" class="quick-action-card" id="action-inschrijvingen">
                        <span class="quick-action-icon">📋</span>
                        <span class="quick-action-label">Inschrijvingen bekijken</span>
                        <span class="quick-action-desc">Beheer alle inschrijvingen</span>
                    </a>
                    <a href="{{ route('huisjes.create') }}" class="quick-action-card" id="action-huisje-toevoegen">
                        <span class="quick-action-icon">➕</span>
                        <span class="quick-action-label">Huisje toevoegen</span>
                        <span class="quick-action-desc">Voeg een nieuw huisje toe</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="quick-action-card" id="action-users">
                        <span class="quick-action-icon">👥</span>
                        <span class="quick-action-label">Gebruikers beheren</span>
                        <span class="quick-action-desc">Rollen en accounts beheren</span>
                    </a>
                </div>
            </div>

            {{-- Recent Inschrijvingen --}}
            <div class="admin-section">
                <div class="admin-section-header">
                    <h2 class="admin-section-title">Recente inschrijvingen</h2>
                    <a href="{{ route('admin.inschrijvingen') }}" class="btn btn-secondary btn-sm">Bekijk alles →</a>
                </div>
                @if($recentInschrijvingen->isEmpty())
                    <div class="admin-empty">
                        <p>Nog geen inschrijvingen ontvangen.</p>
                    </div>
                @else
                    <div class="admin-table-wrap">
                        <table class="admin-table" id="recent-inschrijvingen-table">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Personen</th>
                                    <th>Vakantie</th>
                                    <th>Datum</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentInschrijvingen as $i)
                                <tr>
                                    <td><strong>{{ $i->naam }}</strong></td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ $i->personen }}</td>
                                    <td>{{ $i->holiday ?? '—' }}</td>
                                    <td>{{ $i->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.inschrijvingen.show', $i->id) }}" class="btn btn-secondary btn-sm">Bekijken</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
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
