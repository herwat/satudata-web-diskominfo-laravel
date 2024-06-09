@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Data</h3>
                <a href="{{ asset('storage/' . $data->file_excel) }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-success">
                    <i class="fa fa-download"></i>Download
                </a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            @if (isset($excel[0]))
                                @foreach ($excel[0] as $header)
                                    <th>{{ $header }}</th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($excel as $key => $row)
                            @if ($key > 0)
                                <tr>
                                    @foreach ($row as $cell)
                                        <td>{{ $cell }}</td>
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>

            </div>
            {{-- chart  --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"> Grafik Data</h5>
                                <a href="{{ asset('storage/' . $data->file_excel) }}" target="_blank"
                                    rel="noopener noreferrer" class="btn btn-success">
                                    <i class="fa fa-download"></i>Download
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            <strong></strong>
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
                <hr>

            </div>
            <div class="card-header">
                <h3 class="card-title">META DATA</h3>
            </div>
            {{-- chart  --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    @foreach ($data->getAttributes() as $key => $value)
                        <tr>
                            <th>
                                @switch($key)
                                    @case('nama')
                                        Nama
                                    @break

                                    <!-- Tambahkan case lain sesuai kebutuhan -->

                                    @default
                                        {{ ucfirst(str_replace('_', ' ', $key)) }}
                                @endswitch
                            </th>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                <hr>

            </div>
        </div>
    </div>
@endsection
