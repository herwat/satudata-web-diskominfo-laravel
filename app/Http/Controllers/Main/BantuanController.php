<?php

namespace App\Http\Controllers\Main;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Bantuan';
        $bantuan = Bantuan::all();
        $data['result'] = $bantuan->sortDesc();
        return view('main.bantuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Bantuan";
        return view("main.bantuan.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama produk tidak boleh kosong',
            ]
        );

        Bantuan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect('main/bantuan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Bantuan::findOrFail($id);
        return view('main.bantuan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Data Bantuan";
        $data['result'] = Bantuan::findOrFail($id);
        return view("main.bantuan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Bantuan::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->penanggung_jawab = $request->penanggung_jawab;
            $row->deskripsi = $request->deskripsi;
            // Simpan perubahan
            $row->save();

            return redirect('main/bantuan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}