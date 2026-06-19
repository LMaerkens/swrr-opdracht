<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inschrijving details - SRWW Admin">
    <title>Inschrijving #{{ $inschrijving->id }} - Admin SRWW</title>
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
            <a href="{{ route('admin.inschrijvingen') }}" class="sidebar-link active" id="nav-inschrijvingen">
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
                <h1 class="admin-page-title">Inschrijving #{{ $inschrijving->id }}</h1>
                <p class="admin-page-subtitle">Ingediend op {{ $inschrijving->created_at->format('d-m-Y \o\m H:i') }}</p>
            </div>
            <div class="admin-header-actions">
                <a href="{{ route('admin.inschrijvingen') }}" class="btn btn-secondary btn-sm">← Terug naar overzicht</a>
            </div>
        </header>

        <div class="admin-content">
            <div class="detail-grid">
                {{-- Persoonsgegevens --}}
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <span class="detail-card-icon">👤</span>
                        Persoonsgegevens
                    </h3>
                    <dl class="detail-list">
                        <div class="detail-row">
                            <dt>Naam</dt>
                            <dd>{{ $inschrijving->naam }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Adres</dt>
                            <dd>{{ $inschrijving->adres }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Postcode</dt>
                            <dd>{{ $inschrijving->postcode }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Telefoon</dt>
                            <dd>{{ $inschrijving->telefoon ?? '—' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Email</dt>
                            <dd><a href="mailto:{{ $inschrijving->email }}">{{ $inschrijving->email }}</a></dd>
                        </div>
                        <div class="detail-row">
                            <dt>Aantal personen</dt>
                            <dd>{{ $inschrijving->personen }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Lidmaatschap --}}
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <span class="detail-card-icon">🪪</span>
                        Lidmaatschap
                    </h3>
                    <dl class="detail-list">
                        <div class="detail-row">
                            <dt>Lid?</dt>
                            <dd>
                                @if($inschrijving->ben_je_lid === 'ja')
                                    <span class="badge badge-green">Ja</span>
                                @else
                                    <span class="badge badge-gray">{{ $inschrijving->ben_je_lid ?? 'Niet ingevuld' }}</span>
                                @endif
                            </dd>
                        </div>
                        <div class="detail-row">
                            <dt>Lidnummer</dt>
                            <dd>{{ $inschrijving->lidnummer ?? '—' }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Vakantiegegevens --}}
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <span class="detail-card-icon">🏖️</span>
                        Vakantiegegevens
                    </h3>
                    <dl class="detail-list">
                        <div class="detail-row">
                            <dt>Vakantie</dt>
                            <dd>{{ $inschrijving->holiday ?? '—' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Type verblijf</dt>
                            <dd>{{ $inschrijving->type_verblijf ?? '—' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Keus 1</dt>
                            <dd>
                                @if($inschrijving->keus1_van && $inschrijving->keus1_tot)
                                    {{ $inschrijving->keus1_van }} t/m {{ $inschrijving->keus1_tot }}
                                @else
                                    —
                                @endif
                            </dd>
                        </div>
                        <div class="detail-row">
                            <dt>Keus 2</dt>
                            <dd>
                                @if($inschrijving->keus2_van && $inschrijving->keus2_tot)
                                    {{ $inschrijving->keus2_van }} t/m {{ $inschrijving->keus2_tot }}
                                @else
                                    —
                                @endif
                            </dd>
                        </div>
                        <div class="detail-row">
                            <dt>Huisje(s)</dt>
                            <dd>{{ $inschrijving->huisje ?? '—' }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Extra --}}
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <span class="detail-card-icon">📝</span>
                        Extra informatie
                    </h3>
                    <dl class="detail-list">
                        <div class="detail-row">
                            <dt>Toelichting</dt>
                            <dd>{{ $inschrijving->toelichting ?? 'Geen toelichting opgegeven.' }}</dd>
                        </div>
                        <div class="detail-row">
                            <dt>Akkoord voorwaarden</dt>
                            <dd>
                                @if($inschrijving->akkoord)
                                    <span class="badge badge-green">Ja</span>
                                @else
                                    <span class="badge badge-red">Nee</span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            {{-- Actions --}}
            <div class="detail-actions">
                <a href="{{ route('admin.inschrijvingen') }}" class="btn btn-secondary">← Terug</a>
                <form method="POST" action="{{ route('admin.inschrijvingen.destroy', $inschrijving->id) }}"
                      onsubmit="return confirm('Weet je zeker dat je deze inschrijving wilt verwijderen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="delete-inschrijving">Verwijderen</button>
                </form>
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
