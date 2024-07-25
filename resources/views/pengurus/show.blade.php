@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4 font-mono">Detail Pengurus</h1>

    <!-- Card untuk menampilkan informasi detail pengurus -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row items-center gap-6">
        <!-- Kolom kiri: Foto pengurus -->
        @if($pengurus->foto)
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="{{ $pengurus->nama }}" class="w-40 h-40 object-cover rounded-full border-2 border-gray-200">
        </div>
        @else
        <div class="flex-shrink-0 w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-4xl">
            ? <!-- Placeholder jika tidak ada foto -->
        </div>
        @endif

        <!-- Kolom kanan: Informasi pengurus -->
        <div class="flex-grow mt-4 md:mt-0 md:ml-6">
            <div class="flex mb-2">
                <strong class="w-32">Nama</strong>
                <span>: {{ $pengurus->nama }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Divisi</strong>
                <span>: {{ $pengurus->divisi->nama_divisi }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Jabatan</strong>
                <span>: {{ $pengurus->jabatan->nama_jabatan }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">NIM</strong>
                <span>: {{ $pengurus->nim }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Kelas</strong>
                <span>: {{ $pengurus->kelas }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Alamat</strong>
                <span>: {{ $pengurus->alamat }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Email</strong>
                <span>: {{ $pengurus->email }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Telepon</strong>
                <span>: {{ $pengurus->telp }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Angkatan</strong>
                <span>: {{ $pengurus->angkatan }}</span>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
        <a href="{{ route('pengurus.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection