<?php

namespace App\Http\Controllers\Main;

use App\Models\Infografis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Infografis';
        $infografis = Infografis::all();
        $data['result'] = $infografis->sortDesc();
        return view('main.infografis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Infografis";
        return view("main.infografis.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'gambar' => 'required|max:1280',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'gambar.size' => 'gambar maksimal 1mb',
            ]
        );

        Infografis::create([
            'nama' => $request->nama,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar->store('gambar', 'public'),
        ]);

        return redirect('main/infografis')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Infografis::findOrFail($id);
        return view('main.infografis.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Data Infografis";
        $data['result'] = Infografis::findOrFail($id);
        return view("main.infografis.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Infografis::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->penanggung_jawab = $request->penanggung_jawab;
            $row->deskripsi = $request->deskripsi;

            // Mengelola gambar
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($row->gambar && file_exists(storage_path('app/public/' . $row->gambar))) {
                    unlink(storage_path('app/public/' . $row->gambar));
                }
                // Upload gambar baru
                $gambar = $request->file('gambar');
                $nama_gambar = 'gambar/' . time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->storeAs('public', $nama_gambar);
                $row->gambar = $nama_gambar;
            }
            // Simpan perubahan
            $row->save();

            return redirect('main/infografis')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $infografis = Infografis::findOrFail($id);
        $infografis->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}