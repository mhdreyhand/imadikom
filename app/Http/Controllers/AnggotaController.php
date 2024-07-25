<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari permintaan pengguna
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        // Jika ada parameter pencarian, gunakan untuk melakukan pencarian
        $query = Anggota::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%');
        }

        if ($tahun) {
            $query->whereYear('created_at', '=', $tahun); // Filter berdasarkan tahun
        }

        // Dapatkan data dengan pagination
        $anggota = $query->paginate(15);

        return view('anggota.index', compact('anggota'));
    }


    // Menampilkan form untuk menambahkan anggota baru
    public function create()
    {
        $anggota = Anggota::all();
        return view('anggota.create', compact('anggota'));
    }

    // Menyimpan anggota baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:anggota,email',
            'telp' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Validasi file foto
        ]);

        // Inisialisasi array data anggota dengan data yang diterima
        $data = $request->all();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan file gambar ke direktori 'public/storage/anggota'
            $filePath = $request->file('foto')->store('anggota', 'public');

            // Simpan jalur file gambar ke array data anggota
            $data['foto'] = $filePath;
        }

        // Simpan data anggota ke database
        Anggota::create($data);

        // Redirect ke halaman daftar anggota dengan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit anggota
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }


    // Menyimpan perubahan pada anggota ke dalam database
    public function update(Request $request, Anggota $anggota)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:anggota,email,' . $anggota->id, // Pastikan email unik untuk anggota lain
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
            $filePath = $request->file('foto')->store('anggota', 'public');
            // Simpan jalur file gambar ke data
            $data['foto'] = $filePath;

            // Hapus file gambar lama jika ada
            if ($anggota->foto) {
                \Storage::disk('public')->delete($anggota->foto);
            }
        }

        // Perbarui data anggota di database
        $anggota->update($data);

        // Redirect ke halaman daftar anggota dengan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function show(Anggota $anggota)
    {
        // Kirim data anggota ke view 'anggota.show'
        return view('anggota.show', compact('anggota'));
    }



    // Menghapus anggota dari database
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus.');
    }
}
