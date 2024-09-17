<?php

namespace App\Http\Controllers;

use App\Models\Kplmanagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KplmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kplmanagements = kplmanagement::all();
        return view('pages.kplmanagement.index', compact('kplmanagements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kplmanagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_izin' => 'required|string|unique:kplmanagement,no_izin,',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:dokters,npwp,',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'spesialisasi' => 'required|string',
            'email' => 'required|string|unique:dokters,email,',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->image) {

            $data['image'] = $request->file('image')->store('asset/kplmanagement', 'public');
        }

        kplmanagement::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('dokter.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_izin' => 'required|string|unique:kplmanagements,no_izin,' . $id,
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:kplmanagements,npwp,' . $id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'spesialisasi' => 'required|string',
            'email' => 'required|string|unique:kplmanagements,email,' . $id,
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $kplmanagement = kplmanagement::findOrFail($id);
        $data = $request->all();

        if ($request->image) {
            Storage::delete('public/' . $kplmanagement->image);
            $data['image'] = $request->file('image')->store('asset/kplmanagement', 'public');
        }

        $kplmanagement->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('kplmanagement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kplmanagement = kplmanagement::findOrFail($id);
        Storage::delete('public/' . $kplmanagement->image);
        $kplmanagement->delete();
        if ($kplmanagement) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('kplmanagement.index');
    }
}
