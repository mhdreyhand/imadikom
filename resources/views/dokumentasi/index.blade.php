@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">

    <h1 class="text-4xl font-bold mb-2 text-center font-sans">Dokumentasi IMADIKOM</h1>

    @auth
    <!-- Display the "Tambah" button only for authenticated users -->
    <a href="{{ route('dokumentasi.create') }}" class="bg-sky-400 hover:bg-sky-500 text-white font-bold px-4 py-2 rounded mb-2 inline-block">Tambah Foto</a>
    @if(session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Formulir Pencarian -->
    <form method="GET" action="{{ route('dokumentasi.index') }}" id="filterForm" class="mb-4">
        <input type="text" name="search" placeholder="Cari..." class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded" value="{{ request('search') }}">
        <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">Cari</button>

        <!-- Filter Tahun -->
        <select name="tahun" id="tahunFilter" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2" onchange="filterByYear()">
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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Nama</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Deskripsi</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Tempat</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Foto</th>
                    @auth
                    <!-- Display the "Aksi" column only for authenticated users -->
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($dokumentasi as $index => $d)

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $d->nama }}</td>
                    <td class="px-6 py-4 whitespace-wrap">{!! nl2br(e($d->deskripsi)) !!}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $d->tempat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ $d->getFotoUrlAttribute() }}" alt="Foto Dokumentasi" class="max-w-xs max-h-24">
                    </td>
                    @auth
                    <!-- Display the "Edit" and "Hapus" buttons only for authenticated users -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('dokumentasi.edit', $d->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                        <form action="{{ route('dokumentasi.destroy', $d->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumentasi ini?')">Hapus</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth

<!-- tampilan publik -->
@guest
<div class="container mx-auto px-4 mt-6">
    <!-- Formulir Pencarian -->
    <form method="GET" action="{{ route('dokumentasi.index') }}" id="filterForm" class="mb-4">
        <input type="text" name="search" placeholder="Cari..." class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded" value="{{ request('search') }}">
        <button type="submit" class="bg-sky-300 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">Cari</button>

        <!-- Filter Tahun -->
        <select name="tahun" id="tahunFilter" class="border focus:outline-none focus:ring focus:border-sky-300 px-4 py-2 rounded mr-2" onchange="filterByYear()">
            <option value="">--Pilih Tahun--</option>
            @foreach(range(date('Y'), date('Y') - 10) as $year)
            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
    </form>
    @foreach($dokumentasi as $d)
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6 text-center">
        <h3 class="text-2xl font-bold mb-2">{{ $d->nama }}</h3>
        <img src="{{ $d->getFotoUrlAttribute() }}" alt="Foto Dokumentasi" class="w-1/4 h-auto rounded-lg mb-4 mx-auto">
        <p class="text-gray-500 mt-2">Tanggal: {{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}</p>
        <p class="text-gray-500 mt-2">Tempat: {{ $d->tempat }}</p>
        <p class="text-gray-700 mt-2">{{ $d->deskripsi }}</p>
    </div>
    @endforeach
</div>
@endguest
@endsection

<!-- JavaScript untuk filter tahun -->
<script>
    function filterByYear() {
        // Ambil elemen form
        const form = document.getElementById('filterForm');
        // Submit form
        form.submit();
    }
</script>