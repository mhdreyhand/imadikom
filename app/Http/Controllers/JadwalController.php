<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Proker;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar jadwal.
     */
    public function index(Request $request)
    {
        // Ambil input pencarian, status, dan tahun
        $search = $request->input('search');
        $status = $request->input('status');
        $tahun = $request->input('tahun');

        // Inisialisasi query untuk Jadwal
        $query = Jadwal::query();

        // Tambahkan kondisi pencarian berdasarkan nama kegiatan dan tempat
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%');
            });
        }

        // Tambahkan kondisi filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }

        // Tambahkan kondisi filter berdasarkan tahun pada kolom 'mulai' dan 'selesai'
        if ($tahun) {
            $query->where(function ($q) use ($tahun) {
                $q->whereYear('mulai', $tahun)
                    ->orWhereYear('selesai', $tahun);
            });
        }

        // Dapatkan data jadwal
        $jadwals = $query->get();

        // Perbarui status otomatis
        foreach ($jadwals as $jadwal) {
            $jadwal->updateStatus();
        }

        // Dapatkan data jadwal dengan paginasi
        $jadwals = $query->paginate(15);

        // Kirim data ke view
        return view('jadwal.index', compact('jadwals', 'search', 'status', 'tahun'));
    }

    public function updateJadwalStatus($id)
    {
        // Temukan jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        if ($jadwal) {
            // Perbarui status jadwal
            $jadwal->updateStatus();

            return response()->json(['message' => 'Status updated successfully.']);
        } else {
            return response()->json(['message' => 'Jadwal not found.'], 404);
        }
    }
    /**
     * Menampilkan formulir untuk membuat jadwal baru.
     */
    public function create()
    {
        $proker = Proker::all();

        return view('jadwal.create', compact('proker'));
    }

    /**
     * Menyimpan jadwal baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'tempat' => 'required|string|max:255',
        ]);

        Jadwal::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'tempat' => $request->tempat,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    /**
     * Menampilkan formulir untuk mengedit jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        $proker = Proker::all();

        return view('jadwal.edit', compact('jadwal', 'proker'));
    }

    /**
     * Memperbarui jadwal di database.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'tempat' => 'required|string|max:255',
        ]);

        $jadwal->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'tempat' => $request->tempat,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal dari database.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
