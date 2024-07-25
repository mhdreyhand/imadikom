@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Proker</h1>

        <!-- Tombol Kembali -->
        <a href="{{ route('proker.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>

        <!-- Form Edit Proker -->
        <form action="{{ route('proker.update', $proker->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Divisi -->
            <div class="mb-4">
                <label for="divisi_id" class="block font-semibold mb-2">Divisi:</label>
                <select name="divisi_id" id="divisi_id" class="form-select w-full border border-gray-300 p-2 rounded" required>
                    @foreach($divisis as $divisi)
                    <option value="{{ $divisi->id }}" {{ $proker->divisi_id == $divisi->id ? 'selected' : '' }}>
                        {{ $divisi->nama_divisi }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block font-semibold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-input w-full border border-gray-300 p-2 rounded" value="{{ $proker->nama }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block font-semibold mb-2">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-textarea w-full border border-gray-300 p-2 rounded" rows="4" required>{{ $proker->deskripsi }}</textarea>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection