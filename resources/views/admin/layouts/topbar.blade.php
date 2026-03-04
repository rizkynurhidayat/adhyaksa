{{-- Admin Topbar --}}
<header class="admin-topbar">
    <div style="display: flex; align-items: center; gap: 16px;">
        {{-- Hamburger (Mobile) --}}
        <button class="topbar-hamburger" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        {{-- Page Title --}}
        <h1 class="topbar-title">@yield('title', 'Dashboard')</h1>
    </div>

    {{-- Actions --}}
    <div class="topbar-actions">
        {{-- User Dropdown --}}
        <div class="topbar-user" onclick="toggleUserDropdown(event)">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">Admin</span>
            </div>

            {{-- Dropdown Menu --}}
            <div class="user-dropdown" id="userDropdown">
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
