{{-- Admin Sidebar --}}
<aside class="admin-sidebar" id="adminSidebar">

    {{-- Logo --}}
    <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
        <div class="logo-icon">A</div>
        <span class="logo-text">Adhyaksa</span>
    </a>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
            </span>
            Dashboard
        </a>

        {{-- Hero Section --}}
        <a href="{{ route('admin.hero.index') }}"
           class="nav-item {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7h20L12 2z"/>
                    <path d="M2 17l10 5 10-5"/>
                    <path d="M2 12l10 5 10-5"/>
                </svg>
            </span>
            Hero Section
        </a>

        {{-- Profil Pendiri --}}
        <a href="{{ route('admin.profil.index') }}"
           class="nav-item {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            Profil Pendiri
        </a>

        {{-- Layanan --}}
        <a href="{{ route('admin.layanan.index') }}"
           class="nav-item {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            Layanan
        </a>

        {{-- Spacer --}}
        <div style="flex: 1;"></div>

        {{-- Sign Out --}}
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                </span>
                Sign Out
            </button>
        </form>
    </nav>
</aside>
