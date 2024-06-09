<?php

namespace App\Http\Controllers\Main;

use App\Models\Kemiskinan;
use Illuminate\Http\Request;
use App\Imports\KemiskinanImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class KemiskinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Kemiskinan';
        $kemiskinan = Kemiskinan::all();
        $data['result'] = $kemiskinan->sortDesc();
        return view('main.kemiskinan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Kemiskinan";
        return view("main.kemiskinan.create", $data);
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

        // Buat entri baru dalam database
        Kemiskinan::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        // Redirect dengan pesan sukses
        return redirect('main/kemiskinan')->with('success', 'Data Kemiskinan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Kemiskinan::findOrFail($id);
        return view('main.kemiskinan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset Kemiskinan";
        $data['result'] = Kemiskinan::findOrFail($id);
        return view("main.kemiskinan.edit", $data);
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
        // Temukan data kemiskinan berdasarkan ID
        $row = Kemiskinan::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/kemiskinan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kemiskinan = Kemiskinan::findOrFail($id);
        $kemiskinan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset Kemiskinan";
        return view("main.kemiskinan.import", $data);
    }

    function importkemiskinan(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new KemiskinanImport, $file);

        return redirect('main/kemiskinan')->with('success', 'Data berhasil Di Import!');
    }
}
