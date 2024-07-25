@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <h1 class="text-4xl font-bold mb-2 text-center font-sans">Daftar Proker IMADIKOM</h1>

    @auth
    <!-- Tampilkan tombol "Buat Proker Baru" hanya untuk pengguna yang login -->
    <a href="{{ route('proker.create') }}" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Proker</a>
    @endauth

    @if(session('success'))
    <!-- Tampilkan pesan sukses jika ada -->
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Formulir Pencarian -->
    <form method="GET" action="{{ route('proker.index') }}" class="mb-4" id="filterForm">
        <input type="text" name="search" placeholder="Cari Proker..." class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded" value="{{ request('search') }}">
        <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">Cari</button>

        <!-- Filter Tahun -->
        <select name="tahun" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2" id="tahunFilter" onchange="filterByYear()">
            <option value="">--Pilih Tahun--</option>
            @foreach(range(date('Y'), date('Y') - 10) as $year)
            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
    </form>

    @foreach($prokers as $divisi_id => $groupedProkers)
    <h2 class="text-xl font-bold my-4">{{ $groupedProkers->first()->divisi->nama_divisi ?? 'Divisi Tidak Diketahui' }}</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white border-b-2 border-sky-300">
                <tr>
                    <th scope="col" class="px-6 py-3 w-16 text-left text-xs font-bold text-black uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 w-1/4 text-left text-xs font-bold text-black uppercase tracking-wider">Nama</th>
                    <th scope="col" class="px-6 py-3 w-1/2 text-left text-xs font-bold text-black uppercase tracking-wider">Deskripsi</th>
                    @auth
                    <th scope="col" class="px-6 py-3 w-32 text-left text-xs font-bold text-black uppercase tracking-wider">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($groupedProkers as $index => $proker)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $proker->nama }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $proker->deskripsi }}</td> <!-- Ubah kelas CSS di sini -->

                    @auth
                    <!-- Tampilkan tombol aksi hanya untuk pengguna yang login -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('proker.edit', $proker->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                        <form action="{{ route('proker.destroy', $proker->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus proker ini?')">Hapus</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection

<!-- JavaScript untuk filter tahun -->
<script>
    function filterByYear() {
        // Ambil form filter
        const form = document.getElementById('filterForm');
        // Kirim form ke server
        form.submit();
    }
</script>
