<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    // Menampilkan semua alumni
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari permintaan pengguna
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        // Jika ada parameter pencarian, gunakan untuk melakukan pencarian
        $query = Alumni::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%');
        }

        if ($tahun) {
            $query->whereYear('created_at', '=', $tahun); // Filter berdasarkan tahun
        }

        // Dapatkan data dengan pagination
        $alumni = $query->paginate(15);

        return view('alumni.index', compact('alumni'));
    }


    // Menampilkan form untuk menambahkan alumni baru
    public function create()
    {
        $alumni = Alumni::all();
        return view('alumni.create', compact('alumni'));
    }

    // Menyimpan alumni baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:alumni,email',
            'telp' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Validasi file foto
        ]);

        // Inisialisasi array data alumni dengan data yang diterima
        $data = $request->all();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan file gambar ke direktori 'public/storage/alumni'
            $filePath = $request->file('foto')->store('alumni', 'public');

            // Simpan jalur file gambar ke array data alumni
            $data['foto'] = $filePath;
        }

        // Simpan data alumni ke database
        Alumni::create($data);

        // Redirect ke halaman daftar alumni dengan pesan sukses
        return redirect()->route('alumni.index')->with('success', 'Data berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit alumni
    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }


    // Menyimpan perubahan pada alumni ke dalam database
    public function update(Request $request, Alumni $alumni)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:alumni,email,' . $alumni->id, // Pastikan email unik untuk alumni lain
            'telp' => 'required',
            'kelas' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Validasi file foto
            'angkatan' => 'required',
        ]);

        // Inisialisasi array data dengan data yang diterima
        $data = $request->all();

        // Menangani unggahan foto jika ada
        if ($request->hasFile('foto')) {
            // Simpan file gambar baru
            $filePath = $request->file('foto')->store('alumni', 'public');
            // Simpan jalur file gambar ke data
            $data['foto'] = $filePath;

            // Hapus file gambar lama jika ada
            if ($alumni->foto) {
                \Storage::disk('public')->delete($alumni->foto);
            }
        }

        // Perbarui data alumni di database
        $alumni->update($data);

        // Redirect ke halaman daftar alumni dengan pesan sukses
        return redirect()->route('alumni.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function show(Alumni $alumni)
    {
        // Kirim data alumni ke view 'alumni.show'
        return view('alumni.show', compact('alumni'));
    }



    // Menghapus alumni dari database
    public function destroy(Alumni $alumni)
    {
        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data berhasil dihapus.');
    }
}
