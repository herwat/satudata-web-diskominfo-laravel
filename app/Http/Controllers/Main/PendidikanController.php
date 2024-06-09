<?php

namespace App\Http\Controllers\Main;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Imports\PendidikanImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Pendidikan';
        $pendidikan = Pendidikan::all();
        $data['result'] = $pendidikan->sortDesc();
        return view('main.pendidikan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Pendidikan";
        return view("main.pendidikan.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'slug' => 'required',
                'penanggung_jawab' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'bulan' => 'required|string|max:20',
                'file_excel' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'penanggung_jawab.required' => 'Penanggung jawab tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                'bulan.required' => 'Bulan tidak boleh kosong',
                'file_excel.required' => 'file_excel tidak boleh kosong',
            ]
        );

        Pendidikan::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/pendidikan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Pendidikan::findOrFail($id);
        return view('main.pendidikan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset pendidikan";
        $data['result'] = Pendidikan::findOrFail($id);
        return view("main.pendidikan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validasi data
        $request->validate([
            'status' => 'required',
        ]);
        // Temukan data pendidikan berdasarkan ID
        $row = Pendidikan::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/pendidikan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset pendidikan";
        return view("main.pendidikan.import", $data);
    }

    function importpendidikan(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new PendidikanImport, $file);

        return redirect('main/pendidikan')->with('success', 'Data berhasil Di Import!');
    }
}
