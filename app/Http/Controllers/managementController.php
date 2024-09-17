<?php

namespace App\Http\Controllers;

use App\Models\Managementdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managements = Managementdb::all();
        return view('pages.management.index', compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|unique:management,nip,',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:management,npwp,',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'email' => 'required|string|unique:management,email,',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('asset/management', 'public');
        }
        Managementdb::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('management.index');
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
            'nip' => 'required|string|unique:management,nip,' . $id,
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:management,npwp,' . $id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'email' => 'required|string|unique:management,email,' . $id,
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $management = Managementdb::findOrFail($id);
        $data = $request->all();

        if ($request->image) {
            Storage::delete('public/' . $management->image);
            $data['image'] = $request->file('image')->store('asset/management', 'public');
        }

        $management->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('management.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $management = Managementdb::findOrFail($id);
        Storage::delete('public/' . $management->image);
        $management->delete();
        if ($management) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('management.index');
    }
}
