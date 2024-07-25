<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    // Menampilkan semua pengurus
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari permintaan pengguna
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        // Jika ada parameter pencarian, gunakan untuk melakukan pencarian
        $query = Pengurus::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%')
                ->orWhereHas('divisi', function ($query) use ($search) {
                    $query->where('nama_divisi', 'like', '%' . $search . '%');
                })
                ->orWhereHas('jabatan', function ($query) use ($search) {
                    $query->where('nama_jabatan', 'like', '%' . $search . '%');
                });
        }

        if ($tahun) {
            $query->whereYear('created_at', '=', $tahun); // Filter berdasarkan tahun
        }

        // Dapatkan data dengan pagination
        $pengurus = $query->paginate(15);

        return view('pengurus.index', compact('pengurus'));
    }


    // Menampilkan form untuk menambahkan pengurus baru
    public function create()
    {
        $pengurus = Pengurus::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('pengurus.create', compact('pengurus', 'divisi', 'jabatan'));
    }

    // Menyimpan pengurus baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:pengurus,email',
            'telp' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Validasi file foto
        ]);

        // Inisialisasi array data pengurus dengan data yang diterima
        $data = $request->all();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan file gambar ke direktori 'public/storage/pengurus'
            $filePath = $request->file('foto')->store('pengurus', 'public');

            // Simpan jalur file gambar ke array data pengurus
            $data['foto'] = $filePath;
        }

        // Simpan data pengurus ke database
        Pengurus::create($data);

        // Redirect ke halaman daftar pengurus dengan pesan sukses
        return redirect()->route('pengurus.index')->with('success', 'Data berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit pengurus
    public function edit(Pengurus $pengurus)
    {
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('pengurus.edit', compact('pengurus', 'divisi', 'jabatan'));
    }


    // Menyimpan perubahan pada pengurus ke dalam database
    public function update(Request $request, Pengurus $pengurus)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'nim' => 'required', // Tambahkan validasi untuk kolom-kolom yang diperlukan
            'alamat' => 'required',
            'email' => 'required|email|unique:pengurus,email,' . $pengurus->id, // Pastikan email unik untuk pengurus lain
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
            $filePath = $request->file('foto')->store('pengurus', 'public');
            // Simpan jalur file gambar ke data
            $data['foto'] = $filePath;

            // Hapus file gambar lama jika ada
            if ($pengurus->foto) {
                \Storage::disk('public')->delete($pengurus->foto);
            }
        }

        // Perbarui data pengurus di database
        $pengurus->update($data);

        // Redirect ke halaman daftar pengurus dengan pesan sukses
        return redirect()->route('pengurus.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function show(Pengurus $pengurus)
    {
        // Kirim data pengurus ke view 'pengurus.show'
        return view('pengurus.show', compact('pengurus'));
    }



    // Menghapus pengurus dari database
    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();

        return redirect()->route('pengurus.index')->with('success', 'Data berhasil dihapus.');
    }
}
