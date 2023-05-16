<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        // Simpan data baru
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $validatedData['nama'];
        $mahasiswa->email = $validatedData['email'];
        $mahasiswa->save();

        // Redirect dengan menambahkan fragment hash untuk menampilkan modal
        return redirect()->route('mahasiswa.index', '#successModal')->with('success', 'Data mahasiswa berhasil ditambahkan');
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nama = $validatedData['nama'];
        $mahasiswa->email = $validatedData['email'];
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }

}