<?php

namespace App\Http\Controllers\Main;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Role';
        $role = Role::all();
        $data['result'] = $role->sortDesc();
        return view('main.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Role";
        return view("main.role.create", $data);
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

        Role::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/role')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Role::findOrFail($id);
        return view('main.role.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['title'] = "Edit Data Role";
        $data['result'] = Role::findOrFail($id);
        return view("main.role.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Role::find($id);
        if ($row) {
            $row->nama = $request->nama;
            // Simpan perubahan
            $row->save();

            return redirect('main/role')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}
