<?php

namespace App\Http\Controllers\Main;

use App\Models\User;
use App\Models\Sosial;
use App\Models\Ekonomi;
use App\Models\Kemiskinan;
use App\Models\Pendidikan;
use App\Models\Kependudukan;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use App\Models\LinkunganHidup;
use App\Http\Controllers\Controller;
use App\Models\Laravisit;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index()
    {
        $data['Ekonomi'] = Ekonomi::count();
        $data['Kemiskinan'] = Kemiskinan::count();
        $data['Kependudukan'] = Kependudukan::count();
        $data['LingkunganHidup'] = LinkunganHidup::count();
        $data['Pemerintahan'] = Pemerintahan::count();
        $data['Pendidikan'] = Pendidikan::count();
        $data['Sosial'] = Sosial::count();
        $data['visitorData'] = Laravisit::count();
        $data['title'] = 'Dashboard';

        $countEKo = Laravisit::where('visitable_type','App\Models\Ekonomi')->count();
        $countKem = Laravisit::where('visitable_type','App\Models\Kemiskinan')->count();
        $countKep = Laravisit::where('visitable_type','App\Models\Kependudukan')->count();
        $countLin = Laravisit::where('visitable_type','App\Models\LingkunganHidup')->count();
        $countPem = Laravisit::where('visitable_type','App\Models\Pemerintahan')->count();
        $countPen = Laravisit::where('visitable_type','App\Models\Pendidikan')->count();
        $countSos = Laravisit::where('visitable_type','App\Models\Sosial')->count();
        // dd($countEKo);

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('line')
            ->size(['width' => 600, 'height' => 250])
            ->labels(['','Data Ekonomi', 'Data Kemiskinan', 'Data Kependudukan', 'Data Lingkungan H', 'Data Pemerintahan', 'Data Pendidikan', 'Data Sosial'])
            ->datasets([
                [
                   "label" => "Grafik Kunjungan Setiap DataSet",
                    'backgroundColor' => ['#212224','#f26b21', '#f78e31', '#fbb040', '#fcec52', '#cbdb47', '#99ca3c', '#208b3a'],
                    'data' => [0,$countEKo, $countKem, $countKep, $countLin, $countPem, $countPen, $countSos],
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


        // return view('main.home.home', $data);
        return view('main.home.home', $data, compact('data', 'chartjs'));
    }
}
