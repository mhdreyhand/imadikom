@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Anggota</h2>

        <!-- Tombol Kembali -->
        <a href="{{ route('anggota.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>

        <!-- Form Edit Anggota -->
        <!-- Pastikan formulir memiliki atribut enctype="multipart/form-data" untuk memungkinkan unggahan file -->
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block font-semibold mb-2">Nama:</label>
                <input type="text" class="form-input w-full border border-gray-300 p-2 rounded" id="nama" name="nama" value="{{ $anggota->nama }}" required>
            </div>

            <!-- Nomor Identitas -->
            <div class="mb-4">
                <label for="nim" class="block font-semibold mb-2">Nomor Identitas:</label>
                <input type="text" class="form-input w-full border border-gray-300 p-2 rounded" id="nim" name="nim" value="{{ $anggota->nim }}">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block font-semibold mb-2">Alamat:</label>
                <textarea class="form-textarea w-full border border-gray-300 p-2 rounded" id="alamat" name="alamat">{{ $anggota->alamat }}</textarea>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-2">Email:</label>
                <input type="email" class="form-input w-full border border-gray-300 p-2 rounded" id="email" name="email" value="{{ $anggota->email }}" required>
            </div>

            <!-- Telepon -->
            <div class="mb-4">
                <label for="telp" class="block font-semibold mb-2">Telepon:</label>
                <input type="text" class="form-input w-full border border-gray-300 p-2 rounded" id="telp" name="telp" value="{{ $anggota->telp }}">
            </div>

            <!-- Kelas -->
            <div class="mb-4">
                <label for="kelas" class="block font-semibold mb-2">Kelas:</label>
                <input type="text" class="form-input w-full border border-gray-300 p-2 rounded" id="kelas" name="kelas" value="{{ $anggota->kelas }}">
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label for="foto" class="block font-semibold mb-2">Foto:</label>
                <!-- Input type file untuk unggahan foto -->
                <input type="file" class="form-input w-full border border-gray-300 p-2 rounded" id="foto" name="foto">
                <!-- Tampilkan foto yang ada (jika ada) -->
                @if ($anggota->foto)
                <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto Anggota" class="mt-2" style="max-width: 200px;">
                @endif
            </div>

            <!-- Angkatan -->
            <div class="mb-4">
                <label for="angkatan" class="block font-semibold mb-2">Angkatan:</label>
                <input type="text" class="form-input w-full border border-gray-300 p-2 rounded" id="angkatan" name="angkatan" value="{{ $anggota->angkatan }}">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection