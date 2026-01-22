<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
    {
        $list =
            [
                [
                    'title' => 'Sistem Manajemen Parkir',
                    'status' => 'Finished',
                    'statusColor' => 'success',
                    'desc' => 'Aplikasi manajemen parkir berbasis web untuk pencatatan kendaraan, monitoring slot parkir, dan laporan transaksi parkir',
                    'tech' => ['PHP Native', 'MySQL', 'Bootstrap'],
                    'repo' => 'https://github.com/Fadlan079/Sistem-Manajemen-Parkir.git'
                ],
                [
                    'title' => 'Sistem Manajemen Rental Mobil',
                    'status' => 'Ongoing',
                    'statusColor' => 'warning',
                    'desc' => 'Aplikasi manajemen rental mobil untuk pengelolaan kendaraan, pelanggan, dan transaksi sewa',
                    'tech' => ['Laravel', 'MySQL', 'Tailwind CSS'],
                    'repo' => 'https://github.com/Fadlan079/FinalProject-RentalMobil.git'
                ],
                [
                    'title' => 'Sistem Kasir',
                    'status' => 'Planned',
                    'statusColor' => 'danger',
                    'desc' => 'Aplikasi kasir berbasis web untuk pengelolaan produk, transaksi, dan laporan penjualan',
                    'tech' => ['CodeIgniter 4', 'MySQL', 'Bootstrap'],
                    'repo' => '#'
                ],
                [
                    'title' => 'Website Portofolio Pribadi',
                    'status' => 'Ongoing',
                    'statusColor' => 'warning',
                    'desc' => 'Website portofolio pribadi dengan animasi modern dan dukungan multi-language',
                    'tech' => ['Laravel', 'Vite', 'Tailwind CSS', 'GSAP'],
                    'repo' => 'https://github.com/Fadlan079/Personal-Portfolio.git'
                ],
                [
                    'title' => 'Aplikasi To-Do List',
                    'status' => 'Finished',
                    'statusColor' => 'success',
                    'desc' => 'Aplikasi to-do list untuk mengelola tugas harian dengan fitur CRUD dan status task',
                    'tech' => ['JavaScript', 'HTML', 'CSS', 'LocalStorage'],
                    'repo' => '#'
                ],
                [
                    'title' => 'Sistem Informasi Perpustakaan',
                    'status' => 'Finished',
                    'statusColor' => 'success',
                    'desc' => 'Sistem informasi perpustakaan untuk pengelolaan buku, anggota, dan peminjaman',
                    'tech' => ['Laravel', 'PostgreSQL', 'Bootstrap'],
                    'repo' => '#'
                ],
                [
                    'title' => 'REST API Manajemen Produk',
                    'status' => 'Finished',
                    'statusColor' => 'success',
                    'desc' => 'REST API untuk manajemen produk dengan autentikasi dan validasi data',
                    'tech' => ['Laravel', 'REST API', 'JWT', 'MySQL'],
                    'repo' => '#'
                ],
                [
                    'title' => 'Aplikasi Absensi Online',
                    'status' => 'Ongoing',
                    'statusColor' => 'warning',
                    'desc' => 'Aplikasi absensi online berbasis web dengan autentikasi user dan rekap data',
                    'tech' => ['React', 'Laravel API', 'Tailwind CSS'],
                    'repo' => '#'
                ],
                [
                    'title' => 'Dashboard Admin Analytics',
                    'status' => 'Finished',
                    'statusColor' => 'success',
                    'desc' => 'Dashboard admin untuk visualisasi data dan statistik menggunakan grafik interaktif',
                    'tech' => ['Vue.js', 'Chart.js', 'REST API'],
                    'repo' => '#'
                ],
            ];
        $featuredProjects = array_slice($list, 0, 3);
        return view('portofolio', compact('featuredProjects'));
    }
}
