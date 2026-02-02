<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project')->insert([
            [
                'title' => 'Portfolio Website',
                'type' => 'Website',
                'desc' => 'Website portofolio untuk menampilkan karya secara interaktif, menarik, dan mudah diakses oleh semua pengunjung.',
                'status' => 'In Progress',
                'tech' => json_encode(['Laravel', 'TailwindCSS', 'GSAP', 'JavaScript']),
                'repo' => 'https://github.com/Fadlan079/Personal-Portfolio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sistem Manajemen Parkir',
                'type' => 'Web App',
                'desc' => 'Sistem web parkir untuk mengelola kendaraan masuk/keluar, kapasitas, dan riwayat secara efisien.',
                'status' => 'Archived',
                'tech' => json_encode(['PHPNative', 'TailwindCSS','JavaScript','OCR']),
                'repo' => 'https://github.com/Fadlan079/Sistem-Manajemen-Parkir.git',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aplikasi Web Penyewaan Mobil',
                'type' => 'Web App',
                'desc' => 'Aplikasi web rental mobil untuk memesan, memantau, dan mengelola penyewaan kendaraan secara mudah.',
                'status' => 'Archived',
                'tech' => json_encode(['PHPNative', 'TailwindCSS','JavaScript']),
                'repo' => 'https://github.com/Fadlan079/FinalProject-RentalMobil.git',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
