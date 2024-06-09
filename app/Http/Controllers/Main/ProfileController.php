<?php

namespace App\Http\Controllers\Main;

use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Profile Saya";
        $data['dataUser'] = Auth::user();
        return view("main.profile.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nip = $request->input('nip');
        $user->jk = $request->input('jk');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->alamat = $request->input('alamat');
        $user->no_hp = $request->input('no_hp');

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

        return redirect('main/home')->with('success', 'Data Profile Anda berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
