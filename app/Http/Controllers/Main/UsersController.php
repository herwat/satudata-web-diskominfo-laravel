<?php

namespace App\Http\Controllers\Main;

use App\Models\Role;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
// use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = "Data Pegawai";
        $user = User::with('jabatan', 'role')->get();
        $data['result'] = $user->sortDesc();
        return view("main.user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['jabatan'] = Jabatan::all();
        $data['role'] = Role::all();
        $data['title'] = "Tambah Data Pegawai";
        return view("main.user.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'role_id' => $request->role_id,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'tanggal_bergabung' => $request->tanggal_bergabung,
            'no_hp' => $request->no_hp,
            'gambar' => $request->gambar->store('gambar', 'public'), // Menggunakan file storage untuk menyimpan gambar
            'status' => $request->status,
        ]);
        return redirect('main/user')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = "Lihat Data Pegawai";
        $data['result'] = User::with('jabatan', 'role')->findOrFail($id);
        return view("main.user.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Edit Data Pegawai";
        $data['jabatan'] = Jabatan::all();
        $data['role'] = Role::all();
        $data['result'] = User::with('jabatan', 'role')->findOrFail($id);
        return view("main.user.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->jabatan_id = $request->input('jabatan_id');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->nip = $request->input('nip');
        $user->jk = $request->input('jk');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->alamat = $request->input('alamat');
        $user->tanggal_bergabung = $request->input('tanggal_bergabung');
        $user->no_hp = $request->input('no_hp');
        $user->status = $request->input('status');

        // Mengelola gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($user->gambar && file_exists(storage_path('app/public/' . $user->gambar))) {
                unlink(storage_path('app/public/' . $user->gambar));
            }
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = 'gambar/' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public', $nama_gambar);
            $user->gambar = $nama_gambar;
        }


        // Periksa apakah pengguna memasukkan kata sandi baru
        if ($request->filled('new_password') && $request->filled('confirm_password')) {
            // Pastikan kata sandi baru dan konfirmasi sesuai
            if ($request->new_password === $request->confirm_password) {
                $user->password = bcrypt($request->new_password);
            } else {
                return redirect()->back()->with('error', 'Kata sandi baru dan konfirmasi tidak cocok.');
            }
        }

        $user->save();

        return redirect('main/user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    function generateUniqueCode($prefix = '', $length = 8)
    {
        // Menetapkan prefix ke kode (jika ada)
        $code = $prefix;

        // Menetapkan panjang sisa kode yang harus di-generate
        $remainingLength = $length - strlen($prefix);

        // Menghasilkan karakter random dengan panjang sisa kode
        $randomPart = Str::random($remainingLength);

        // Menggabungkan prefix dan karakter random untuk mendapatkan kode lengkap
        $code .= $randomPart;

        return $code;
    }

    function import()
    {
        $data['title'] = "Data Pegawai";
        return view("main.user.import", $data);
    }

    // function prosesimport(Request $request)
    // {
    //     $file = $request->file('file');

    //     Excel::import(new UsersImport, $file);

    //     return redirect('main/user')->with('success', 'Data Pegawai berhasil Di Import!');
    // }
}
