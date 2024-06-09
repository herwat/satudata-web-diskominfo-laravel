<?php

namespace App\Http\Controllers\Main;

use App\Models\User;
use App\Models\Pengingat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data['title'] = 'Data Pengingat';
        if ($user->role_id == 1) {
            $pengingat = Pengingat::all();
        } else {
            $pengingat = Pengingat::where('user_id', '=', $user->id)->get();
        }

        $data['result'] = $pengingat->sortDesc();
        return view('main.pengingat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['title'] = "Tambah Data Pengingat";
        return view("main.pengingat.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'waktu' => 'required',
            ],
            [
                'waktu.required' => 'waktu   tidak boleh kosong',
            ]
        );

        pengingat::create([
            'waktu' => $request->waktu,
            'tenggat_waktu' => $request->tenggat_waktu,
            'user_id' => $request->user_id,
            'topik' => $request->topik,
            'frekuensi' => $request->frekuensi,
            'status' => $request->status,
        ]);

        return redirect('main/pengingat')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = pengingat::findOrFail($id);
        return view('main.pengingat.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Data Pengingat";
        $data['result'] = pengingat::findOrFail($id);
        return view("main.pengingat.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = pengingat::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->penanggung_jawab = $request->penanggung_jawab;
            $row->deskripsi = $request->deskripsi;
            // Simpan perubahan
            $row->save();

            return redirect('main/pengingat')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pengingat = pengingat::findOrFail($id);
        $pengingat->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}
