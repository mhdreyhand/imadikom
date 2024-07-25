@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <h1 class="text-4xl font-bold mb-2 text-center font-sans">Daftar Anggota IMADIKOM</h1>

    @auth
    <!-- Display the "Tambah Anggota" button only for authenticated users -->
    <a href="{{ route('anggota.create') }}" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block font-sans">Tambah Anggota</a>
    @if(session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4 font-sans">{{ session('success') }}</div>
    @endif
    @endauth

    <!-- Formulir Pencarian -->
    <form method="GET" action="{{ route('anggota.index') }}" class="mb-4" id="filterForm">
        <input type="text" name="search" placeholder="Cari Anggota..." class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded font-sans" value="{{ request('search') }}">
        <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded font-sans">Cari</button>

        <!-- Filter Tahun -->
        <select name="tahun" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2 font-sans" id="tahunFilter" onchange="filterByYear()">
            <option value="">--Pilih Tahun--</option>
            @foreach(range(date('Y'), date('Y') - 10) as $year)
            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white border-b-2 border-sky-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider font-sans">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider font-sans">Nama</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider font-sans">Angkatan (Tahun)</th>
                    @auth
                    <!-- Display the "Aksi" column only for authenticated users -->
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider font-sans">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($anggota as $index => $m)

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-sans">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap font-sans">
                        <a href="{{ route('anggota.show', $m->id) }}" class="text-black hover:text-sky-500">
                            {{ $m->nama }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-sans">{{ $m->angkatan }}</td>
                    @auth
                    <!-- Display the "Edit" and "Hapus" buttons only for authenticated users -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('anggota.edit', $m->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2 font-sans">Edit</a>
                        <form action="{{ route('anggota.destroy', $m->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-sans" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- JavaScript untuk filter tahun -->
<script>
    function filterByYear() {
        // Ambil form filter
        const form = document.getElementById('filterForm');
        // Submit form
        form.submit();
    }
</script>