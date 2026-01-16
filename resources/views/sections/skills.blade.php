<div class="max-w-6xl mx-auto px-6">
  <h3 class="text-3xl font-bold mb-12 text-primary text-center">
    Skills & Bahasa
  </h3>

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <x-skill-card
      icon="fa-brands fa-laravel"
      title="Laravel"
      subtitle="Digunakan sebagai backend utama"
      badge="Digunakan di beberapa proyek web"
      color="primary"
      :items="[
        'Autentikasi & manajemen user',
        'CRUD & validasi data',
        'REST API dasar',
        'Integrasi database MySQL',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-php"
      title="PHP (Native)"
      subtitle="Digunakan untuk logika backend"
      badge="Digunakan di proyek web Native"
      color="indigo-500"
      :items="[
        'CRUD & Pengolahan data',
        'Session & Autentikasi',
        'Validasi form & request',
        'Integrasi database MySQL',
      ]"
    />

    <x-skill-card
      icon="fa-solid fa-database"
      title="MySQL"
      subtitle="Manajemen databse relasional"
      badge="Digunakan di proyek web Native"
      color="blue-500"
      :items="[
        'Query CRUD & filtering data',
        'Perancangan struktur tabel & relasi',
        'Integrasi dengan backend PHP & Laravel',
        'Pemahaman normalisasi data & anomali',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-html5"
      title="HTML"
      subtitle="Struktur halaman web"
      badge="Digunakan di proyek web Native"
      color="orange-500"
      :items="[
        'Struktur semantik HTML',
        'Integrasi dengan CSS & JavaScript',
        'Optimasi struktur untuk SEO dasar',
        'Pemisahan konten & presentasi',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-css3-alt"
      title="CSS"
      subtitle="Styling layout antarmuka"
      badge="Digunakan di proyek web Native"
      color="sky-500"
      :items="[
        'Responsive layout dengan TailwindCSS',
        'Penggunaan komponen Bootstrap',
        'Pengaturan spacing, warna, dan tipografi',
        'Konsistensi UI antar halaman',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-js"
      title="JavaScript"
      subtitle="Interaksi sisi klien"
      badge="Digunakan di proyek web Native"
      color="yellow-400"
      :items="[
        'Manipulasi DOM',
        'Validasi form sederhana',
        'Interaksi UI dinamis',
        'Integrasi dengan backend',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-python"
      title="Python"
      subtitle="Scripting & logika dasar"
      badge="Digunakan di proyek web Native"
      color="blue-500"
      :items="[
        'Dasar pemprograman python',
        'Pengolahan data sedderhana',
        'Eksperimen logika & automasi kecil',
        'Eksplorasi library sesuai kebutuhan ',
      ]"
    />

    <x-skill-card
      icon="fa-brands fa-linux"
      title="Linux"
      subtitle="lingkungan server & deployment"
      badge="Digunakan di proyek web Native"
      color="amber-500"
      :items="[
        'Manajemen file & permission',
        'Konfigurasi web server dasar',
        'Deployment applikasi web',
        'Penggunaan terminal',
      ]"
    />
  </div>
</div>