<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Models\LinkunganHidup;
use App\Imports\LingkunganImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LingkunganHidupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Linkungan Hidup';
        $lingkungan = LinkunganHidup::all();
        $data['result'] = $lingkungan->sortDesc();
        return view('main.lingkungan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Linkungan Hidup";
        return view("main.lingkungan.create", $data);
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

        LinkunganHidup::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/lingkungan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = LinkunganHidup::findOrFail($id);
        return view('main.lingkungan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset lingkungan";
        $data['result'] = LinkunganHidup::findOrFail($id);
        return view("main.lingkungan.edit", $data);
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
        // Temukan data lingkungan berdasarkan ID
        $row = LinkunganHidup::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/lingkungan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $lingkungan = LinkunganHidup::findOrFail($id);
        $lingkungan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset lingkungan";
        return view("main.lingkungan.import", $data);
    }

    function importlingkungan(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new LingkunganImport, $file);

        return redirect('main/lingkungan')->with('success', 'Data berhasil Di Import!');
    }
}
