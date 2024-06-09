<?php

namespace App\Http\Controllers\Main;

use App\Models\Ekonomi;
use Illuminate\Http\Request;
use App\Imports\EkonomiImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Dataset Ekonomi';
        $ekonomi = Ekonomi::all();
        $data['result'] = $ekonomi->sortDesc();
        return view('main.ekonomi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Dataset Ekonomi";
        return view("main.ekonomi.create", $data);
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
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        Ekonomi::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/ekonomi')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = 'Detail Data Ekonomi';
        $data['result'] = Ekonomi::findOrFail($id);
        return view('main.ekonomi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset Ekonomi";
        $data['result'] = Ekonomi::findOrFail($id);
        return view("main.ekonomi.edit", $data);
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
        // Temukan data ekonomi berdasarkan ID
        $row = Ekonomi::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/ekonomi')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ekonomi = Ekonomi::findOrFail($id);
        $ekonomi->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
    public function import()
    {
        $data['title'] = "Import Dataset Ekonomi";
        return view("main.ekonomi.import", $data);
    }

    function importekonomi(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new EkonomiImport, $file);

        return redirect('main/ekonomi')->with('success', 'Data berhasil Di Import!');
    }
}
