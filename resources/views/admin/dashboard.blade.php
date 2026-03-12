@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

    {{-- Welcome Card --}}
    <div class="admin-card welcome-card">
        <h2>Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p>Kelola konten Landing Page Adhyaksa dari dashboard ini.</p>
    </div>

    {{-- Statistics Cards --}}
    <div class="stats-grid">

        {{-- Stat 1: Total Klien --}}
        <div class="admin-card stat-card">
            <div class="stat-icon blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $totalKlien }}</h3>
                <p>Total Klien</p>
            </div>
        </div>

        {{-- Stat 2: Total Layanan --}}
        <div class="admin-card stat-card">
            <div class="stat-icon purple">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $totalLayanan }}</h3>
                <p>Total Layanan</p>
            </div>
        </div>

        {{-- Stat 3: Total Blog --}}
        <div class="admin-card stat-card">
            <div class="stat-icon green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $totalBlog }}</h3>
                <p>Total Blog</p>
            </div>
        </div>

    </div>

@endsection
