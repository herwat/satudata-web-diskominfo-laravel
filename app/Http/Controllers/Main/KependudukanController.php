<?php

namespace App\Http\Controllers\Main;

use App\Models\Kependudukan;
use Illuminate\Http\Request;
use App\Imports\KependudukanImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class KependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Kependudukan';
        $kependudukan = Kependudukan::all();
        $data['result'] = $kependudukan->sortDesc();
        return view('main.kependudukan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Kependudukan";
        return view("main.kependudukan.create", $data);
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

        Kependudukan::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/kependudukan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Kependudukan::findOrFail($id);
        return view('main.kependudukan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset kependudukan";
        $data['result'] = Kependudukan::findOrFail($id);
        return view("main.kependudukan.edit", $data);
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
        // Temukan data kependudukan berdasarkan ID
        $row = Kependudukan::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/kependudukan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kependudukan = Kependudukan::findOrFail($id);
        $kependudukan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset kependudukan";
        return view("main.kependudukan.import", $data);
    }

    function importkependudukan(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new KependudukanImport, $file);

        return redirect('main/kependudukan')->with('success', 'Data berhasil Di Import!');
    }
}