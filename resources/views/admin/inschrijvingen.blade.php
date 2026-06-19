<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inschrijvingen beheren - SRWW Admin">
    <title>Inschrijvingen - Admin SRWW</title>
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
                <h1 class="admin-page-title">Inschrijvingen</h1>
                <p class="admin-page-subtitle">{{ $inschrijvingen->total() }} inschrijving(en) gevonden</p>
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
                <form method="GET" action="{{ route('admin.inschrijvingen') }}" class="admin-search-form" id="search-form">
                    <input type="hidden" name="sort" value="{{ $sortField }}">
                    <input type="hidden" name="dir" value="{{ $sortDir }}">
                    <div class="admin-search-wrap">
                        <span class="admin-search-icon">🔍</span>
                        <input type="text" name="search" value="{{ $search }}"
                               placeholder="Zoek op naam of email..."
                               class="admin-search-input" id="search-input">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Zoeken</button>
                    @if($search)
                        <a href="{{ route('admin.inschrijvingen') }}" class="btn btn-secondary btn-sm">Wissen</a>
                    @endif
                </form>
            </div>

            {{-- Table --}}
            @if($inschrijvingen->isEmpty())
                <div class="admin-empty">
                    <div class="admin-empty-icon">📋</div>
                    <h3>Geen inschrijvingen gevonden</h3>
                    @if($search)
                        <p>Probeer een andere zoekopdracht.</p>
                    @else
                        <p>Er zijn nog geen inschrijvingen ontvangen.</p>
                    @endif
                </div>
            @else
                <div class="admin-table-wrap">
                    <table class="admin-table" id="inschrijvingen-table">
                        <thead>
                            <tr>
                                @php
                                    $columns = [
                                        'id' => '#',
                                        'naam' => 'Naam',
                                        'email' => 'Email',
                                        'personen' => 'Personen',
                                        'holiday' => 'Vakantie',
                                        'huisje' => 'Huisje',
                                        'created_at' => 'Ingeschreven op',
                                    ];
                                @endphp
                                @foreach($columns as $col => $label)
                                    @php
                                        $isActive = $sortField === $col;
                                        $nextDir = ($isActive && $sortDir === 'asc') ? 'desc' : 'asc';
                                        $arrow = $isActive ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '';
                                    @endphp
                                    <th>
                                        <a href="{{ route('admin.inschrijvingen', ['sort' => $col, 'dir' => $nextDir, 'search' => $search]) }}"
                                           class="sort-link {{ $isActive ? 'sort-active' : '' }}"
                                           id="sort-{{ $col }}">
                                            {{ $label }}{{ $arrow }}
                                        </a>
                                    </th>
                                @endforeach
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inschrijvingen as $i)
                            <tr id="row-{{ $i->id }}">
                                <td class="td-id">{{ $i->id }}</td>
                                <td><strong>{{ $i->naam }}</strong></td>
                                <td>{{ $i->email }}</td>
                                <td class="td-center">{{ $i->personen }}</td>
                                <td>{{ $i->holiday ?? '—' }}</td>
                                <td>{{ $i->huisje ?? '—' }}</td>
                                <td>{{ $i->created_at->format('d-m-Y H:i') }}</td>
                                <td class="td-actions">
                                    <a href="{{ route('admin.inschrijvingen.show', $i->id) }}" class="btn btn-secondary btn-sm" id="view-{{ $i->id }}">Bekijken</a>
                                    <form method="POST" action="{{ route('admin.inschrijvingen.destroy', $i->id) }}"
                                          onsubmit="return confirm('Inschrijving van {{ $i->naam }} verwijderen?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete-{{ $i->id }}">Verwijder</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($inschrijvingen->hasPages())
                    <div class="admin-pagination">
                        {{ $inschrijvingen->appends(request()->query())->links() }}
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
