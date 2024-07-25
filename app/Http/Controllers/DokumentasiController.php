<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian dan filter tahun
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        // Inisialisasi query untuk Dokumentasi
        $query = Dokumentasi::query();

        // Tambahkan kondisi pencarian berdasarkan nama, deskripsi, tanggal, dan tempat
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('tanggal', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%');
            });
        }

        // Tambahkan kondisi filter berdasarkan tahun pada kolom 'tanggal'
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        // Dapatkan data dokumentasi dengan pagination
        $dokumentasi = $query->paginate(15); // Sesuaikan angka 15 sesuai kebutuhan
        // dd($dokumentasi);
        // Kirim data ke view
        return view('dokumentasi.index', compact('dokumentasi'));
    }



    public function create()
    {
        $proker = Proker::all();

        return view('dokumentasi.create', compact('proker'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'tempat' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk foto
        ]);

        $dokumentasiData = $request->except('foto');

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/dokumentasi'); // Simpan di direktori public/dokumentasi
            $dokumentasiData['foto'] = $fotoPath;
        }

        Dokumentasi::create($dokumentasiData);

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('dokumentasi.show', compact('dokumentasi'));
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        $proker = Proker::all();

        return view('dokumentasi.edit', compact('dokumentasi', 'proker'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'tempat' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk foto
        ]);

        $dokumentasiData = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dokumentasi->foto) {
                Storage::delete($dokumentasi->foto);
            }

            $fotoPath = $request->file('foto')->store('public/dokumentasi');
            $dokumentasiData['foto'] = $fotoPath;
        }

        $dokumentasi->update($dokumentasiData);

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        // Hapus foto jika ada sebelum menghapus dokumentasi
        if ($dokumentasi->foto) {
            Storage::delete($dokumentasi->foto);
        }

        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
