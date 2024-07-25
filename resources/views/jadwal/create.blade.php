@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">Buat Jadwal Baru</h1>

        <!-- Tombol Kembali -->
        <a href="{{ route('jadwal.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>

        <!-- Form Buat Jadwal -->
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <!-- Nama Kegiatan -->
            <div class="mb-4">
                <label for="nama_kegiatan" class="block font-semibold mb-2">Nama Kegiatan:</label>
                <select name="nama_kegiatan" id="nama_kegiatan" class="form-select w-full border border-gray-300 p-2 rounded" required>
                    @foreach($proker as $prok)
                        <option value="{{ $prok->nama }}">{{ $prok->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Mulai -->
            <div class="mb-4">
                <label for="mulai" class="block font-semibold mb-2">Mulai:</label>
                <input type="datetime-local" name="mulai" id="mulai" class="form-input w-full border border-gray-300 p-2 rounded" value="{{ old('mulai') }}" required>
            </div>

            <!-- Selesai -->
            <div class="mb-4">
                <label for="selesai" class="block font-semibold mb-2">Selesai:</label>
                <input type="datetime-local" name="selesai" id="selesai" class="form-input w-full border border-gray-300 p-2 rounded" value="{{ old('selesai') }}" required>
            </div>

            <!-- Tempat -->
            <div class="mb-4">
                <label for="tempat" class="block font-semibold mb-2">Tempat:</label>
                <input type="text" name="tempat" id="tempat" class="form-input w-full border border-gray-300 p-2 rounded" value="{{ old('tempat') }}" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection