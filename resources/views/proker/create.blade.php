@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-6 mb-6">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">Buat Proker Baru</h1>

        <!-- Tombol Kembali -->
        <a href="{{ route('proker.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>

        <!-- Form Buat Proker -->
        <form action="{{ route('proker.store') }}" method="POST">
            @csrf

            <!-- Divisi -->
            <div class="mb-4">
                <label for="divisi_id" class="block font-semibold mb-2">Divisi:</label>
                <select name="divisi_id" id="divisi_id" class="form-select w-full border border-gray-300 p-2 rounded" required>
                    <option value="">Pilih Divisi</option>
                    @foreach($divisis as $divisi)
                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Proker Input Container -->
            <div id="proker-input-container">
                <div class="proker-input mb-4">
                    <!-- Nama -->
                    <label for="nama" class="block font-semibold mb-2">Nama Proker:</label>
                    <input type="text" name="prokers[nama][]" id="nama" class="form-input w-full border border-gray-300 p-2 rounded" required>

                    <!-- Deskripsi -->
                    <label for="deskripsi" class="block font-semibold mb-2">Deskripsi:</label>
                    <textarea name="prokers[deskripsi][]" id="deskripsi" class="form-textarea w-full border border-gray-300 p-2 rounded" rows="4" required></textarea>
                </div>
            </div>

            <!-- Tombol Tambah Proker -->
            <button type="button" id="add-proker" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Tambah Proker
            </button>

            <!-- Tombol Simpan -->
            <button type="submit" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded mt-4">
                Simpan
            </button>
        </form>
    </div>
</div>

<!-- JavaScript untuk Input Dinamis -->
<script>
    document.getElementById('add-proker').addEventListener('click', function() {
        const container = document.getElementById('proker-input-container');

        const newProkerInput = document.createElement('div');
        newProkerInput.classList.add('proker-input', 'mb-4');

        // Tambahkan input nama proker baru
        newProkerInput.innerHTML = `
        <label for="nama" class="block font-semibold mb-2">Nama Proker:</label>
        <input type="text" name="prokers[nama][]" id="nama" class="form-input w-full border border-gray-300 p-2 rounded" required>

        <label for="deskripsi" class="block font-semibold mb-2">Deskripsi:</label>
        <textarea name="prokers[deskripsi][]" id="deskripsi" class="form-textarea w-full border border-gray-300 p-2 rounded" rows="4" required></textarea>
    `;

        container.appendChild(newProkerInput);
    });
</script>
@endsection