@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4 font-mono">Detail Alumni</h1>

    <!-- Card untuk menampilkan informasi detail alumni -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row items-center gap-6">
        <!-- Kolom kiri: Foto alumni -->
        @if($alumni->foto)
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $alumni->foto) }}" alt="{{ $alumni->nama }}" class="w-40 h-40 object-cover rounded-full border-2 border-gray-200">
        </div>
        @else
        <div class="flex-shrink-0 w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-4xl">
            ? <!-- Placeholder jika tidak ada foto -->
        </div>
        @endif

        <!-- Kolom kanan: Informasi alumni -->
        <div class="flex-grow mt-4 md:mt-0 md:ml-6">
            <div class="flex mb-2">
                <strong class="w-32">Nama</strong>
                <span>: {{ $alumni->nama }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">NIM</strong>
                <span>: {{ $alumni->nim }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Kelas</strong>
                <span>: {{ $alumni->kelas }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Alamat</strong>
                <span>: {{ $alumni->alamat }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Email</strong>
                <span>: {{ $alumni->email }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Telepon</strong>
                <span>: {{ $alumni->telp }}</span>
            </div>
            <div class="flex mb-2">
                <strong class="w-32">Angkatan</strong>
                <span>: {{ $alumni->angkatan }}</span>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
        <a href="{{ route('alumni.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection