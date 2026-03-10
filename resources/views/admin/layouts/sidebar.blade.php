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
                    <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            Layanan
        </a>

        {{-- Klien --}}
        <a href="{{ route('admin.klien.index') }}"
           class="nav-item {{ request()->routeIs('admin.klien.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
            </span>
            Klien
        </a>

        {{-- Blog --}}
        <a href="{{ route('admin.blog.index') }}"
           class="nav-item {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                </svg>
            </span>
            Blog
        </a>

        {{-- Kontak --}}
        <a href="{{ route('admin.kontak.index') }}"
           class="nav-item {{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-rectwidth="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
           </span>
            Kontak
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
