<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Slide;
use App\Models\Kontak;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        $data['title'] = "Home";
        $data['kontak'] = Kontak::orderBy('id', 'desc')->get();
        $data['bground'] = Slide::orderBy('id', 'desc')->get();
        $data['footer'] = Footer::orderBy('id', 'desc')->get();
        $data['icon'] = url('logo_sulsel.png');
        // dd($data);
        return view("welcome", $data);
    }
}
