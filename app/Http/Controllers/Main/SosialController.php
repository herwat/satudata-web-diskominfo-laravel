<?php

namespace App\Http\Controllers\Main;

use App\Models\Sosial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\SosialImport;
use Maatwebsite\Excel\Facades\Excel;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Sosial';
        $sosial = Sosial::all();
        $data['result'] = $sosial->sortDesc();
        return view('main.sosial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Sosial";
        return view("main.sosial.create", $data);
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

        Sosial::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/sosial')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Sosial::findOrFail($id);
        return view('main.sosial.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset sosial";
        $data['result'] = Sosial::findOrFail($id);
        return view("main.sosial.edit", $data);
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
        // Temukan data sosial berdasarkan ID
        $row = Sosial::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/sosial')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $sosial = Sosial::findOrFail($id);
        $sosial->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset sosial";
        return view("main.sosial.import", $data);
    }

    function importsosial(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new SosialImport, $file);

        return redirect('main/sosial')->with('success', 'Data berhasil Di Import!');
    }
}
