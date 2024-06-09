<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Footer;
use App\Models\Infografis;
use App\Models\Kontak;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Data Infografis";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['bground'] = Slide::orderBy('id', 'desc')->get();
        $data['footer'] = Footer::orderBy('id', 'desc')->get();
        $data['infografis'] = Infografis::orderBy('id', 'desc')->get();
        $data['icon'] = url('logo_sulsel.png');
        // dd($data);
        return view("infografis", $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
