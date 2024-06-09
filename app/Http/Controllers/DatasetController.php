<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Footer;
use App\Models\Kontak;
use App\Models\Sosial;
use App\Models\Ekonomi;
use App\Models\Laravisit;
use App\Models\Kemiskinan;
use App\Models\Pendidikan;
use App\Models\Kependudukan;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Models\LinkunganHidup;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DatasetController extends Controller
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
        $kemiskinanData = Kemiskinan::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Kemiskinan';
            return $item;
        });
        $kependudukanData = Kependudukan::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Kependudukan';
            return $item;
        });
        $linkunganHidupData = LinkunganHidup::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Linkungan Hidup';
            return $item;
        });
        $pemerintahanData = Pemerintahan::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Pemerintahan';
            return $item;
        });
        $pendidikanData = Pendidikan::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Pendidikan';
            return $item;
        });
        $sosialData = Sosial::where('status', '=', 'Diterima')->orderBy('id', 'desc')->get()->map(function ($item) {
            $item->source = 'Sosial';
            return $item;
        });

        // Gabungkan semua data ke dalam satu koleksi
        $data = $data->merge($ekonomiData);
        $data = $data->merge($kemiskinanData);
        $data = $data->merge($kependudukanData);
        $data = $data->merge($linkunganHidupData);
        $data = $data->merge($pemerintahanData);
        $data = $data->merge($pendidikanData);
        $data = $data->merge($sosialData);
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
        $title = 'Dataset ' . $slug;
        $kontak = Kontak::orderBy('id', 'desc')->get();
        $bground = Slide::orderBy('id', 'desc')->get();
        $footer = Footer::orderBy('id', 'desc')->get();
        $icon = url('logo_sulsel.png');


        $countEKo = Laravisit::where('visitable_type', 'App\Models\Ekonomi')->count();
        $countKem = Laravisit::where('visitable_type', 'App\Models\Kemiskinan')->count();
        $countKep = Laravisit::where('visitable_type', 'App\Models\Kependudukan')->count();
        $countLin = Laravisit::where('visitable_type', 'App\Models\LingkunganHidup')->count();
        $countPem = Laravisit::where('visitable_type', 'App\Models\Pemerintahan')->count();
        $countPen = Laravisit::where('visitable_type', 'App\Models\Pendidikan')->count();
        $countSos = Laravisit::where('visitable_type', 'App\Models\Sosial')->count();
        // dd($countEKo);

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('line')
            ->size(['width' => 600, 'height' => 250])
            ->labels(['', 'Data Ekonomi', 'Data Kemiskinan', 'Data Kependudukan', 'Data Lingkungan H', 'Data Pemerintahan', 'Data Pendidikan', 'Data Sosial'])
            ->datasets([
                [
                    "label" => "Grafik Kunjungan Setiap DataSet",
                    'backgroundColor' => ['#212224', '#f26b21', '#f78e31', '#fbb040', '#fcec52', '#cbdb47', '#99ca3c', '#208b3a'],
                    'data' => [0, $countEKo, $countKem, $countKep, $countLin, $countPem, $countPen, $countSos],
                    'fill' => false,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'tension' => 0.1
                ]
            ])
            ->options([
                "scales" => [
                    "y" => [
                        "beginAtZero" => true
                    ]
                ]
            ]);



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
                Laravisit::create([
                    'visitable_type' => $model,
                    'visitable_id' => '1',
                    'data' => json_encode([]), // Ubah sesuai dengan struktur data yang diperlukan
                ]);
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
                    'icon' => $icon,
                    'excel' => $worksheet->toArray(),
                    'footer' => $footer,
                ], compact('data', 'chartjs'));
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
