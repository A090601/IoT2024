<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kplmanagement;
use App\Models\stokObat;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\MonitorCetak;

class MonitorCetakController extends Controller
{

    public function index()
    {
        $pendaftarans = Pendaftaran::where('status_panggilan', 'sudah')->get();
        $dokters = Kplmanagement::all();
        return view('pages.MonitorCetak.index', compact('pendaftarans', 'dokters'));
    }


    public function show($id)
    {
        $pendaftaran = Pendaftaran::with('tindakanMedis')->findOrFail($id); // Mengambil data pendaftaran berdasarkan ID
        $tindakan = MonitorCetak::with('Pendaftaran')->where('pendaftaran_id', $id)->get(); // Mengambil tindakan berdasarkan pendaftaran_id
        $dokter = Kplmanagement::all(); // Mengambil semua data dokter
        // $prescriptions = Obat::where('pendaftaran_id', $id)->get(); // Asumsi ada Prescription model terkait
        // Ambil semua stok obat yang tersedia
        $stokObats = stokObat::all();
        $obats = Obat::with('stokObat')->where('pendaftaran_id', $id)->get();

        return view('pages.MonitorCetak.show', compact('pendaftaran', 'tindakan', 'dokter', 'stokObats', 'obats')); // Mengirim data ke view
    }


    public function store(Request $request)
    {
        $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
            'nama_penyakit' => 'required|string',
            'nama_tindakan' => 'required|string',
            'hasil_periksa' => 'required|string',
            'nama_obat' => 'required|string',

        ]);


        $data = $request->all();

        MonitorCetak::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return back();
    }
}
