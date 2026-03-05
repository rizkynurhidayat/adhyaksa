<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Adhyaksa Admin</title>

    {{-- Google Fonts (Poppins) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{-- Tambahkan ini di atas link admin.css di master.blade.php --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body class="admin-body">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Sidebar Overlay (Mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    {{-- Topbar --}}
    @include('admin.layouts.topbar')

    {{-- Main Content --}}
    <div class="admin-main">
        <div class="admin-content">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="admin-footer">
            &copy; {{ date('Y') }} <a href="{{ url('/') }}">Adhyaksa</a>. All rights reserved.
        </footer>
    </div>

    {{-- Sidebar Toggle Script --}}
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const userDropdown = document.getElementById('userDropdown');

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        }

        function toggleUserDropdown(event) {
            event.stopPropagation();
            userDropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (userDropdown && !e.target.closest('.topbar-user')) {
                userDropdown.classList.remove('show');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
