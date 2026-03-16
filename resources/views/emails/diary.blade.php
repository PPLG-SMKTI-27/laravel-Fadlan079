<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Baru — {{ $data['subject'] }}</title>
    <style>
        /* Reset dasar untuk email */
        body {
            margin: 0;
            padding: 0;
            background-color: #EFEBE4; /* Warna meja/latar luar */
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #3E3A37;
            -webkit-font-smoothing: antialiased;
        }

        /* Kertas Utama */
        .wrap {
            max-width: 560px;
            margin: 40px auto;
            background-color: #FCFAF8; /* Warna kertas jurnal */
            border: 1px solid #D1CCC5;
            border-radius: 2px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* Bagian Kepala Surat */
        .top {
            padding: 32px;
            border-bottom: 2px dashed #EAE5DE; /* Efek jahitan/sobekan kertas */
            text-align: center;
        }
        .top .label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #D97706; /* Warna tinta amber/emas */
            font-weight: bold;
            margin-bottom: 8px;
        }
        .top .title {
            font-family: Georgia, 'Times New Roman', serif;
            font-style: italic;
            font-size: 24px;
            color: #2C2825;
            margin: 0;
        }

        /* Bagian Isi */
        .body {
            padding: 32px;
        }

        /* Tabel Meta Data (Aman untuk semua email client) */
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 32px;
        }
        .meta-table td {
            padding: 12px 0;
            border-bottom: 1px solid #EAE5DE; /* Garis buku tulis */
        }
        .key {
            width: 100px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #8C857E;
            vertical-align: top;
        }
        .val {
            font-size: 14px;
            color: #3E3A37;
            font-weight: bold;
        }

        /* Blok Pesan Utama */
        .msg-block {
            background-color: #F4EFE6; /* Warna kertas lebih gelap sedikit */
            border-left: 3px solid #D97706; /* Garis aksen tinta */
            padding: 24px;
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 15px;
            line-height: 1.8;
            white-space: pre-wrap;
            color: #4A4541;
        }

        /* Kaki Surat */
        .footer {
            padding: 24px 32px;
            border-top: 1px solid #EAE5DE;
            font-size: 12px;
            color: #9D968F;
            text-align: center;
            font-family: Georgia, 'Times New Roman', serif;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="wrap">

        <div class="top">
            <div class="label">Pemberitahuan Sistem</div>
            <h1 class="title">Satu Pesan Baru Diterima.</h1>
        </div>

        <div class="body">
            <table class="meta-table">
                <tr>
                    <td class="key">Kategori</td>
                    <td class="val">{{ ucfirst($data['type']) }}</td>
                </tr>
                <tr>
                    <td class="key">Pengirim</td>
                    <td class="val">
                        <a href="mailto:{{ $data['email'] }}" style="color: #D97706; text-decoration: none;">
                            {{ $data['email'] }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="key">Judul Pesan</td>
                    <td class="val">{{ $data['subject'] }}</td>
                </tr>
            </table>

            <div class="key" style="margin-bottom: 8px;">Isi Pesan:</div>
            <div class="msg-block">{{ $data['message'] }}</div>
        </div>

        <div class="footer">
            Dikirim melalui formulir kontak portofolio.<br>
            Diarsipkan pada {{ now()->format('d M Y, H:i') }}
        </div>

    </div>
</body>
</html>
