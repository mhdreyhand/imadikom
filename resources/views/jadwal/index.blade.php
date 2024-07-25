    @extends('layout')

    @section('content')
    <div class="container mx-auto px-4 mt-6 mb-6">
        <h1 class="text-4xl font-bold mb-2 text-center font-sans">Daftar Jadwal IMADIKOM</h1>

        @auth
        <!-- Tampilkan tombol "Buat Jadwal Baru" hanya untuk pengguna yang login -->
        <a href="{{ route('jadwal.create') }}" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Buat Jadwal Baru</a>
        @endauth

        <!-- Formulir Pencarian -->
        <form method="GET" action="{{ route('jadwal.index') }}" class="mb-4" id="filterForm">
            <input type="text" name="search" placeholder="Cari Jadwal..." value="{{ request('search') }}" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2">
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">Cari</button>

            <!-- Filter Status -->
            <select name="status" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2" id="statusFilter" onchange="filterByStatus()">
                <option value="">--Pilih Status--</option>
                <option value="belum dilaksanakan" {{ request('status') == 'belum dilaksanakan' ? 'selected' : '' }}>Belum Dilaksanakan</option>
                <option value="sedang berlangsung" {{ request('status') == 'sedang berlangsung' ? 'selected' : '' }}>Sedang Berlangsung</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <!-- Filter Tahun -->
            <select name="tahun" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2" onchange="filterByYear()">
                <option value="">--Pilih Tahun--</option>
                @foreach(range(date('Y'), date('Y') - 10) as $year)
                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </form>

        @if(session('success'))
        <!-- Tampilkan pesan sukses jika ada -->
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white border-b-2 border-sky-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Nama Kegiatan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Mulai</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Selesai</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Tempat</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Status</th>
                        @auth
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Aksi</th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($jadwals as $index => $jadwal)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->nama_kegiatan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->mulai)->format('d-m-Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->selesai)->format('d-m-Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->tempat }}</td>
                        <!-- Tambahkan kondisi warna untuk kolom status -->
                        <td class="px-6 py-4 whitespace-nowrap 
            @if($jadwal->status === 'belum dilaksanakan')
                text-red-500
            @elseif($jadwal->status === 'selesai')
                text-green-500
            @endif">
                            {{ $jadwal->status }}
                        </td>
                        @auth
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                            </form>
                        </td>
                        @endauth
                    </tr>
                    @endforeach
                    </select>
                    </form>
            </table>
        </div>
    </div>
    @endsection

    <!-- JavaScript untuk filter -->
    <script>
        function filterByYear() {
            // Ambil form filter
            const form = document.getElementById('filterForm');
            // Kirim permintaan dengan data form
            form.submit();
        }

        function filterByStatus() {
            // Ambil form filter
            const form = document.getElementById('filterForm');
            // Kirim permintaan ke server
            form.submit();
        }
    </script>