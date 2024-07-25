@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Tambah Dokumentasi</h2>

        <!-- Tombol Kembali -->
        <a href="{{ route('dokumentasi.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>


        <!-- Form Tambah Dokumentasi -->
        <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block font-semibold mb-2">Nama:</label>
                <select name="nama" id="nama" class="form-select w-full border border-gray-300 p-2 rounded" required>
                    @foreach($proker as $prok)
                        <option value="{{ $prok->nama }}">{{ $prok->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block font-semibold mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-textarea w-full border border-gray-300 p-2 rounded" rows="4" required></textarea>
            </div>

            <!-- Tanggal -->
            <div class="mb-4">
                <label for="tanggal" class="block font-semibold mb-2">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-input w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Tempat -->
            <div class="mb-4">
                <label for="tempat" class="block font-semibold mb-2">Tempat:</label>
                <input type="text" id="tempat" name="tempat" class="form-input w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label for="foto" class="block font-semibold mb-2">Foto:</label>
                <input type="file" id="foto" name="foto" class="form-input w-full border border-gray-300 p-2 rounded">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded w-full">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection