<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fadlan Firdaus - Full Stack Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            /* Warna latar belakang diambil dari warna sampul binder di fotomu (Beige/Taupe) */
            background-color: #E5E4DF;
            color: #18181B; /* Zinc 900 */
            -webkit-font-smoothing: antialiased;
        }

        /* Kartu Kertas / Halaman Jurnal */
        .diary-page {
            background-color: #FFFFFF;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            border: 1px solid #F4F4F5;
            position: relative;
        }

        /* Ornamen Lubang Binder (Di sisi kiri kertas) */
        .binder-holes {
            position: absolute;
            left: 1rem;
            top: 2rem;
            bottom: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            justify-content: center;
        }

        .hole {
            width: 12px;
            height: 12px;
            background-color: #E5E4DF; /* Tembus ke warna background luar */
            border-radius: 50%;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Navbar Melayang */
        .dynamic-island {
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Menyembunyikan scrollbar untuk kerapian */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="relative pb-24 md:pb-0 selection:bg-zinc-300 selection:text-black">

    <nav class="dynamic-island fixed bottom-6 md:bottom-auto md:top-6 left-1/2 -translate-x-1/2 bg-white/90 text-zinc-800 px-2 py-2 rounded-full flex items-center justify-between gap-2 z-50 w-[90%] md:w-max max-w-[400px] border border-zinc-200">
        <div class="w-10 h-10 bg-zinc-100 rounded-full flex items-center justify-center shrink-0 border border-zinc-200">
            <span class="font-bold text-sm">F.</span>
        </div>
        <div class="flex gap-4 md:gap-6 px-2 text-[13px] font-medium text-zinc-500 w-full justify-center">
            <a href="#proyek" class="hover:text-zinc-900 transition">Proyek</a>
            <a href="#keahlian" class="hover:text-zinc-900 transition">Keahlian</a>
            <a href="#profil" class="hover:text-zinc-900 transition">Profil</a>
        </div>
        <a href="#kontak" class="bg-zinc-900 text-white px-5 py-2.5 rounded-full text-[13px] font-semibold hover:bg-zinc-700 transition shrink-0 whitespace-nowrap">
            Hubungi
        </a>
    </nav>

    <section class="pt-20 md:pt-40 pb-20 px-5 max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <div class="w-full md:w-3/5">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white rounded-md text-xs font-medium text-zinc-500 mb-6 shadow-sm border border-zinc-200">
                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                Tersedia untuk pekerjaan penuh waktu
            </div>

            <p class="text-sm font-semibold tracking-widest text-zinc-500 uppercase mb-3">Buku Catatan Pengembangan</p>
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-zinc-900 leading-[1.1]">
                Fadlan Firdaus.<br>
                <span class="text-zinc-500">Full Stack Developer.</span>
            </h1>

            <p class="text-lg md:text-xl text-zinc-600 max-w-xl leading-relaxed mb-8">
                Saya merancang dan membangun aplikasi web yang fungsional, rapi, dan dapat diandalkan. Fokus utama saya adalah menyederhanakan proses sistem yang kompleks menjadi antarmuka yang mudah digunakan.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#proyek" class="px-8 py-4 bg-zinc-900 text-white rounded-xl font-medium text-center hover:bg-zinc-800 transition shadow-md">
                    Lihat Portofolio
                </a>
                <a href="https://github.com" target="_blank" class="px-8 py-4 bg-white text-zinc-800 border border-zinc-300 rounded-xl font-medium text-center hover:bg-zinc-50 transition flex items-center justify-center gap-2">
                    <i class="fa-brands fa-github"></i> GitHub Profile
                </a>
            </div>
        </div>

        <div class="w-full md:w-2/5 flex justify-center">
            <div class="w-64 h-64 md:w-80 md:h-80 rounded-[2rem] bg-white shadow-xl border border-zinc-200 p-2 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                <img src="https://via.placeholder.com/400" alt="Fadlan Photo" class="w-full h-full object-cover rounded-[1.5rem] grayscale hover:grayscale-0 transition-all">
            </div>
        </div>
    </section>

    <section id="proyek" class="px-5 max-w-5xl mx-auto py-16">
        <div class="mb-10 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-zinc-900 mb-3">Daftar Proyek.</h2>
            <p class="text-zinc-600 text-lg">Catatan teknis dari sistem yang telah saya kerjakan.</p>
        </div>

        <div class="flex flex-col gap-10">

            <div class="diary-page pl-10 md:pl-16 pr-6 md:pr-12 py-8 md:py-12 flex flex-col md:flex-row gap-8 group">

                <div class="binder-holes hidden sm:flex">
                    <div class="hole"></div><div class="hole"></div><div class="hole"></div><div class="hole"></div><div class="hole"></div>
                </div>

                <div class="w-full md:w-1/2 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-bold tracking-widest uppercase text-zinc-900">Aplikasi Web</span>
                        <span class="text-xs text-zinc-500">2024</span>
                    </div>

                    <h3 class="text-2xl font-bold mb-4 text-zinc-900">Sistem Manajemen Parkir</h3>

                    <p class="text-zinc-600 leading-relaxed mb-8">
                        Sistem informasi untuk mengelola data kendaraan masuk dan keluar, pembuatan tiket otomatis, serta pelaporan keuangan harian yang terintegrasi dalam satu dasbor yang bersih.
                    </p>

                    <div class="flex flex-wrap gap-2 mt-auto">
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">Laravel</span>
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">Tailwind CSS</span>
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">MySQL</span>
                    </div>
                </div>

                <div class="w-full md:w-1/2 bg-[#E5E4DF] rounded-xl p-4 md:p-8 flex items-center justify-center relative overflow-hidden">
                    <img src="https://via.placeholder.com/800x600/FFFFFF/52525B?text=Preview+Aplikasi" class="w-full h-auto rounded-lg shadow-md group-hover:scale-105 transition-transform duration-500" alt="Preview Parkir">
                </div>
            </div>

            <div class="diary-page pl-10 md:pl-16 pr-6 md:pr-12 py-8 md:py-12 flex flex-col md:flex-row gap-8 group">

                <div class="binder-holes hidden sm:flex">
                    <div class="hole"></div><div class="hole"></div><div class="hole"></div><div class="hole"></div><div class="hole"></div>
                </div>

                <div class="w-full md:w-1/2 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-bold tracking-widest uppercase text-zinc-900">Sistem Informasi</span>
                        <span class="text-xs text-zinc-500">2023</span>
                    </div>

                    <h3 class="text-2xl font-bold mb-4 text-zinc-900">Cylc Rent Car</h3>

                    <p class="text-zinc-600 leading-relaxed mb-8">
                        Platform penyewaan kendaraan yang menangani inventaris mobil, pemesanan pelanggan, dan pengelolaan transaksi secara terpusat untuk meminimalisir kesalahan pencatatan manual.
                    </p>

                    <div class="flex flex-wrap gap-2 mt-auto">
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">PHP Native</span>
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">Bootstrap</span>
                        <span class="px-3 py-1 bg-zinc-100 text-zinc-700 rounded text-xs font-medium border border-zinc-200">MySQL</span>
                    </div>
                </div>

                <div class="w-full md:w-1/2 bg-[#E5E4DF] rounded-xl p-4 md:p-8 flex items-center justify-center relative overflow-hidden">
                    <img src="https://via.placeholder.com/800x600/FFFFFF/52525B?text=Preview+Aplikasi" class="w-full h-auto rounded-lg shadow-md group-hover:scale-105 transition-transform duration-500" alt="Preview Rental">
                </div>
            </div>

        </div>
    </section>

    <section id="keahlian" class="px-5 max-w-5xl mx-auto py-16">
        <div class="mb-10 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-zinc-900 mb-3">Peralatan Teknis.</h2>
            <p class="text-zinc-600 text-lg">Teknologi yang saya gunakan untuk mengembangkan sistem.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="diary-page p-8">
                <i class="fa-solid fa-server text-2xl text-zinc-400 mb-4"></i>
                <h3 class="font-bold text-lg mb-4 text-zinc-900">Backend Development</h3>
                <ul class="space-y-3 text-sm text-zinc-600">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> PHP (Native & Laravel)</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> MySQL Database</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> RESTful API Design</li>
                </ul>
            </div>

            <div class="diary-page p-8">
                <i class="fa-solid fa-layer-group text-2xl text-zinc-400 mb-4"></i>
                <h3 class="font-bold text-lg mb-4 text-zinc-900">Frontend Interface</h3>
                <ul class="space-y-3 text-sm text-zinc-600">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> HTML, CSS, JavaScript</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> Tailwind CSS</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> Bootstrap Framework</li>
                </ul>
            </div>

            <div class="diary-page p-8">
                <i class="fa-solid fa-screwdriver-wrench text-2xl text-zinc-400 mb-4"></i>
                <h3 class="font-bold text-lg mb-4 text-zinc-900">Alat Pendukung</h3>
                <ul class="space-y-3 text-sm text-zinc-600">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> Git & GitHub</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> VS Code</li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-zinc-300"></span> Composer & NPM</li>
                </ul>
            </div>

        </div>
    </section>

    <section id="kontak" class="px-5 max-w-4xl mx-auto pt-16 pb-20 text-center">
        <div class="diary-page p-10 md:p-20 flex flex-col items-center">
            <h2 class="text-3xl md:text-5xl font-bold tracking-tight mb-6 text-zinc-900">Mari bekerja sama.</h2>
            <p class="text-zinc-600 text-base md:text-lg mb-10 max-w-md mx-auto leading-relaxed">
                Jika Anda mencari pengembang untuk membangun sistem yang terstruktur dengan baik, saya siap mendiskusikan kebutuhan Anda.
            </p>
            <a href="mailto:fadlanfirdaus220@gmail.com" class="inline-flex items-center gap-3 px-8 py-4 bg-zinc-900 text-white rounded-xl font-medium hover:bg-zinc-800 transition shadow-lg shadow-zinc-900/10">
                <i class="fa-regular fa-envelope"></i> Kirim Pesan Email
            </a>
        </div>
    </section>

    <footer class="text-center pb-24 md:pb-10 pt-10 text-zinc-500 text-sm font-medium border-t border-zinc-300 max-w-5xl mx-auto">
        <p>&copy; 2026 Fadlan Firdaus. Disusun dengan rapi.</p>
    </footer>

</body>
</html>
