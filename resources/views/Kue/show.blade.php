<!DOCTYPE html>
<html>
<head>
    <title>Show Kue</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .tab-button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #eee;
            border: 1px solid #ccc;
        }
        .tab-button.active {
            background-color: #ddd;
            font-weight: bold;
        }
        .tab-content {
            display: none;
            margin-top: 20px;
        }
        .tab-content.active {
            display: block;
        }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
        .hidden { display: none; }
    </style>
</head>
<body>

    <h1>Informasi Kue</h1>

    <div>
        <button class="tab-button active" data-tab="detail">Detail Kue</button>
        <button class="tab-button" data-tab="pemesanan">Pemesanan Kue</button>
    </div>

    {{-- DATA --}}
    @php
        $detail = collect($data)->firstWhere('title', 'detail kue');
        $pemesanan = collect($data)->firstWhere('title', 'pemesanan kue');
        $daftarKue = $detail['content'] ?? [];
        $opsiKue = $pemesanan['content']['opsi_kue'] ?? [];
    @endphp

    {{-- DETAIL KUE --}}
    <div id="detail" class="tab-content active">
        <h2>Daftar Kue</h2>
        @if (is_array($daftarKue) && count($daftarKue))
            <table>
                <thead>
                    <tr>
                        <th>ID Kue</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarKue as $kue)
                        <tr>
                            <td>{{ $kue['id_kue'] }}</td>
                            <td>{{ $kue['nama'] }}</td>
                            <td>Rp {{ number_format($kue['harga'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data kue.</p>
        @endif
    </div>

    {{-- FORM PEMESANAN --}}
    <div id="pemesanan" class="tab-content">
        <h2>Form Pemesanan</h2>
        <form method="POST" action="{{ url('/kues/pesan') }}">
            @csrf
            <div>
                <label>Nama:</label>
                <input type="text" name="nama" required>
            </div>

            <div>
                <label>No. Telepon:</label>
                <input type="text" name="telepon" required>
            </div>

            <div>
                <label>Jenis Kue:</label>
                <select name="jenis_kue" required>
                    <option value="">-- Pilih Kue --</option>
                    @foreach ($opsiKue as $kue)
                        <option value="{{ $kue }}">{{ $kue }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Jumlah Kue:</label>
                <input type="number" name="jumlah" min="1" required>
            </div>

            <div>
                <label>Pengambilan:</label>
                <input type="radio" name="pengambilan" value="diambil" checked> Diambil
                <input type="radio" name="pengambilan" value="dikirim"> Dikirim
            </div>

            <div id="alamat-group" class="hidden">
                <label>Alamat Pengiriman:</label>
                <textarea name="alamat"></textarea>
            </div>

            <button type="submit">Pesan</button>
        </form>
    </div>

    {{-- Script Toggle --}}
    <script>
        const buttons = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                buttons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                contents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === tab) content.classList.add('active');
                });
            });
        });

        // Toggle alamat pengiriman
        const radioButtons = document.querySelectorAll('input[name="pengambilan"]');
        const alamatGroup = document.getElementById('alamat-group');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', () => {
                alamatGroup.classList.toggle('hidden', radio.value !== 'dikirim');
            });
        });
    </script>

    <hr>
    <a href="{{ url('/kues') }}">← Kembali ke Daftar Kue</a>
</body>
</html>
