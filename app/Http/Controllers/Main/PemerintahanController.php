<?php

namespace App\Http\Controllers\Main;

use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Imports\PemerintahanImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PemerintahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Pemerintahan';
        $pemerintahan = Pemerintahan::all();
        $data['result'] = $pemerintahan->sortDesc();
        return view('main.pemerintahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Pemerintahan";
        return view("main.pemerintahan.create", $data);
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

        Pemerintahan::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'penanggung_jawab' => $request->penanggung_jawab,
            'deskripsi' => $request->deskripsi,
            'bulan' => $request->bulan,
            'status' => $request->status,
            'file_excel' => $request->file_excel->store('file_excel', 'public'),
        ]);

        return redirect('main/pemerintahan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Pemerintahan::findOrFail($id);
        return view('main.pemerintahan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Dataset pemerintahan";
        $data['result'] = Pemerintahan::findOrFail($id);
        return view("main.pemerintahan.edit", $data);
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
        // Temukan data pemerintahan berdasarkan ID
        $row = Pemerintahan::findOrFail($id);
        if ($row) {
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/pemerintahan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pemerintahan = Pemerintahan::findOrFail($id);
        $pemerintahan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    public function import()
    {
        $data['title'] = "Import Dataset pemerintahan";
        return view("main.pemerintahan.import", $data);
    }

    function importpemerintahan(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new PemerintahanImport, $file);

        return redirect('main/pemerintahan')->with('success', 'Data berhasil Di Import!');
    }
}
