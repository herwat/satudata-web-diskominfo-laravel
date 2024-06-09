<?php

namespace App\Http\Controllers\Main;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Footer';
        $footer = Footer::all();
        $data['result'] = $footer->sortDesc();
        return view('main.footer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Footer";
        return view("main.footer.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'gambar' => 'required',
            ],
            [
                'gambar.required' => 'gambar  tidak boleh kosong',
            ]
        );

        Footer::create([
            'gambar' => $request->gambar->store('gambar', 'public'),
        ]);

        return redirect('main/footer')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Footer::findOrFail($id);
        return view('main.footer.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Data Footer";
        $data['result'] = Footer::findOrFail($id);
        return view("main.footer.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Footer::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->penanggung_jawab = $request->penanggung_jawab;
            $row->deskripsi = $request->deskripsi;
            // Simpan perubahan
            $row->save();

            return redirect('main/footer')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $footer = Footer::findOrFail($id);
        $footer->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}