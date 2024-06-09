@extends('layouts.layout_main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Visitor </h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Visitor: {{ date('Y') }}</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <div style="">
                                            {!! $chartjs->render() !!}
                                        </div>
                                        {{-- <canvas id="salesChart" height="180" style="height: 180px;"></canvas> --}}
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Dataset Upload</strong>
                                    </p>

                                    @foreach ($data as $key => $value)
                                        @php
                                            $total = 500; // Atur total sesuai kebutuhan Anda
                                            $value = intval($value);
                                            $total = intval($total);
                                            $persen = ($value / $total) * 100;
                                            $bgColor = ''; // Warna default
                                            // Tentukan warna berdasarkan kategori
                                            switch ($key) {
                                                case 'Ekonomi':
                                                    $bgColor = 'bg-primary';
                                                    break;
                                                case 'Kemiskinan':
                                                    $bgColor = 'bg-danger';
                                                    break;
                                                case 'Kependudukan':
                                                    $bgColor = 'bg-warning';
                                                    break;
                                                case 'LingkunganHidup':
                                                    $bgColor = 'bg-success';
                                                    break;
                                                case 'Pemerintahan':
                                                    $bgColor = 'bg-info';
                                                    break;
                                                case 'Pendidikan':
                                                    $bgColor = 'bg-purple';
                                                    break;
                                                case 'Sosial':
                                                    $bgColor = 'bg-pink';
                                                    break;
                                                default:
                                                    $bgColor = 'bg-secondary';
                                                    break;
                                            }
                                        @endphp
                                        <div class="progress-group">
                                            {{ $key }}
                                            <span class="float-right"><b>{{ $value }}</b>/{{ $total }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar {{ $bgColor }}"
                                                    style="width: {{ $persen }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /.progress-group -->

                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>


            <div class="container-fluid">
                <!-- Info boxes -->

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('hapus'))
                    <div class="alert alert-warning">{{ session('hapus') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="row ">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Ekonomi</span>
                                <span class="info-box-number">{{ $data['Ekonomi'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Kemiskinan</span>
                                <span class="info-box-number">{{ $data['Kemiskinan'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Kependudukan</span>
                                <span class="info-box-number">{{ $data['Kependudukan'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gift"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Lingkungan Hidup</span>
                                <span class="info-box-number">{{ $data['LingkunganHidup'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Pemerintahan</span>
                                <span class="info-box-number">{{ $data['Pemerintahan'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Pendidikan</span>
                                <span class="info-box-number">{{ $data['Pendidikan'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-dots-darker elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">DataSet Sosial</span>
                                <span class="info-box-number">{{ $data['Sosial'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')


@endsection
