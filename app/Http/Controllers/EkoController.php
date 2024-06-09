<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Footer;
use App\Models\Kontak;
use App\Models\Sosial;
use App\Models\Ekonomi;
use App\Models\Kemiskinan;
use App\Models\Pendidikan;
use App\Models\Kependudukan;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Models\LinkunganHidup;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EkoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Dataset";
        $icon = url('logo_sulsel.png');
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $bground = Slide::orderBy('id', 'desc')->get();
        $footer = Footer::orderBy('id', 'desc')->get();

        $data = collect([]);

        // Ambil data dari masing-masing tabel dan tambahkan kolom 'source' untuk menandai asal data
        $ekonomiData = Ekonomi::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Ekonomi';
            return $item;
        });

        // Gabungkan semua data ke dalam satu koleksi
        $data = $data->merge($ekonomiData);
        $data = $data->merge($bground);
        $data = $data->merge($kontak);
        $data = $data->merge($icon);
        $data = $data->merge($title);
        // dd($data);
        // return view("dataset", $data);
        return view('dataset', [
            'data' => $data,
            'title' => $title,
            'icon' => $icon,
            'bground' => $bground,
            'kontak' => $kontak,
            'footer' => $footer,
        ]);
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
    public function show(string $slug)
    {
        $title = 'Dataset Ekonomi';
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $bground = Slide::orderBy('id', 'desc')->get();
        $footer = Footer::orderBy('id', 'desc')->get();
        $icon = url('logo_sulsel.png');


        // Tentukan model yang relevan berdasarkan slug
        $models = [
            'ekonomi' => Ekonomi::class,
            'kemiskinan' => Kemiskinan::class,
            'kependudukan' => Kependudukan::class,
            'lingkungan' => LinkunganHidup::class,
            'pemerintahan' => Pemerintahan::class,
            'pendidikan' => Pendidikan::class,
            'sosial' => Sosial::class,
            // Tambahkan model lain di sini jika perlu
        ];

        foreach ($models as $key => $model) {
            $data = $model::where('slug', $slug)->first();
            if ($data) {
                // Rekam kunjungan
                $data->visit();
                // Mendapatkan path file dari kolom file_excel
                $filePath = public_path('storage/' . $data->file_excel);

                // Cek apakah file ada di path tersebut
                if (!file_exists($filePath)) {
                    return redirect()->back()->with('error', 'File Excel tidak ditemukan.');
                }

                // Load file menggunakan PhpSpreadsheet
                $spreadsheet = IOFactory::load($filePath);
                $worksheet = $spreadsheet->getActiveSheet();

                return view('show.' . $key, [
                    'data' => $data,
                    'title' => $title,
                    'kontak' => $kontak,
                    'bground' => $bground,
                    'footer' => $footer,
                    'icon' => $icon,
                    'excel' => $worksheet->toArray(),
                ], compact('data'));
            }
        }

        return redirect('/dataset')->with('error', 'Data tidak ditemukan');
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
