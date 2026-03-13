<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSection;
use App\Models\ProfilPendiri;
use App\Models\Layanan;
use App\Models\Klien;
use App\Models\Blog;
use App\Models\Kontak;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@adhyaksa.com'],
            [
                'name' => 'Admin Adhyaksa',
                'password' => 'admin123', // Will be auto-hashed by User model cast
            ]
        );

        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'tagline_light' => 'Layanan Hukum',
                'tagline_gold' => 'Profesional untuk Anda',
                'deskripsi' => 'Kami menyediakan layanan hukum yang profesional dan terpercaya untuk memenuhi kebutuhan hukum Anda.',
                'teks_tombol' => 'Hubungi Kami',
                'bg_image' => null,
                'lawyer_image' => null,
            ]
        );

        ProfilPendiri::updateOrCreate(
            ['id' => 1],
            [
                'nama' => 'John Doe',
                'jabatan' => 'Pendiri & CEO',
                'foto' => null,
                'deskripsi' => 'John Doe adalah pendiri Adhyaksa Law Firm dengan pengalaman lebih dari 20 tahun di bidang hukum.',
            ]
        );

            Layanan::updateOrCreate(
                ['slug' => 'konsultasi-hukum'],
                [
                    'judul' => 'Konsultasi Hukum',
                    'ikon' => null,
                    'deskripsi_singkat' => 'Dapatkan konsultasi hukum dari para ahli kami untuk berbagai masalah hukum Anda.',
                    'apa_itu' => 'Konsultasi hukum adalah layanan di mana Anda dapat berkonsultasi dengan pengacara kami untuk mendapatkan nasihat hukum yang tepat.',
                    'mengapa_butuh' => 'Konsultasi hukum penting untuk memastikan bahwa Anda memahami hak dan kewajiban Anda dalam situasi hukum tertentu.',
                    'keuntungan_1' => 'Mendapatkan nasihat hukum yang akurat',
                    'persentase_kasus' => 95,
                    'is_active' => true,
                    'urutan' => 1,
                ]
            );

             Layanan::updateOrCreate(
                ['slug' => 'pendampingan-hukum'],
                [
                    'judul' => 'Pendampingan Hukum',
                    'ikon' => null,
                    'deskripsi_singkat' => 'Kami menyediakan pendampingan hukum untuk membantu Anda melalui proses hukum dengan lancar.',
                    'apa_itu' => 'Pendampingan hukum adalah layanan di mana pengacara kami akan mendampingi Anda selama proses hukum, memberikan dukungan dan nasihat yang diperlukan.',
                    'mengapa_butuh' => 'Pendampingan hukum penting untuk memastikan bahwa Anda memiliki dukungan yang tepat selama proses hukum yang kompleks.',
                    'keuntungan_1' => 'Dukungan profesional selama proses hukum',
                    'persentase_kasus' => 90,
                    'is_active' => true,
                    'urutan' => 2,
                ]
            );
                Layanan::updateOrCreate(
                ['slug' => 'penyelesaian-sengketa'],
                [
                'judul' => 'Litigasi & Penyelesaian Sengketa',
                'ikon' => 'fa-gavel',
                'deskripsi_singkat' => 'Representasi hukum yang kuat di pengadilan untuk membela kepentingan dan hak-hak Anda.',
                'apa_itu' => 'Layanan bantuan hukum di dalam maupun di luar pengadilan untuk menyelesaikan perselisihan secara hukum.',
                'mengapa_butuh' => 'Membutuhkan strategi pembelaan yang tepat untuk memenangkan atau menyelesaikan kasus hukum.',
                'keuntungan_1' => 'Strategi hukum yang komprehensif dan taktis',
                'persentase_kasus' => 85,
                'is_active' => true,
                'urutan' => 3,
                ]
            );

            Klien::updateOrCreate(
                ['nama' => 'PT. Contoh Klien'],
                [
                    'logo' => null,
                    'deskripsi' => 'PT. Contoh Klien adalah salah satu klien kami yang telah bekerja sama dengan kami dalam berbagai kasus hukum.',
                ]
            );

            Blog::updateOrCreate(
                ['judul' => 'Tips Hukum untuk Pemula'],
                [
                    'slug' => 'tips-hukum-untuk-pemula',
                    'gambar' => null,
                    'deskripsi_singkat' => 'Pelajari tips hukum dasar yang penting untuk pemula agar dapat melindungi diri Anda secara hukum.',
                    'konten' => 'Dalam artikel ini, kami akan membahas beberapa tips hukum dasar yang penting untuk pemula. Memahami hak dan kewajiban Anda secara hukum dapat membantu Anda menghindari masalah di masa depan.',
                ]
            );

            Kontak::updateOrCreate(
                ['jenis' => 'email'],
                [
                    'isi' => 'info@adhyaksa.id'
                ]

                
            );


}}