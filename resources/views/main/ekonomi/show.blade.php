@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- Detail Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Judul</th>
                                    <td> : {{ $result->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Penanggung Jawab</th>
                                    <td> : {{ $result->penanggung_jawab }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td> : {{ $result->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td> : {{ $result->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Bulan</th>
                                    <td> : {{ $result->bulan }}</td>
                                </tr>
                                <tr>
                                    <th>Indeks Harga Diterima</th>
                                    <td> : {{ $result->indeks_harga_diterima }}</td>
                                </tr>
                                <tr>
                                    <th>Indeks Harga Dibayar</th>
                                    <td> : {{ $result->indeks_harga_dibayar }}</td>
                                </tr>
                                <tr>
                                    <th>NTP</th>
                                    <td> : {{ $result->ntp }}</td>
                                </tr>
                            </table>

                        </div>

                        <hr>
                        <a href="{{ url('main/ekonomi') }}" class="btn btn-danger">Kembali</a>
                    </div>
                    <!-- Detail Box -->
                </div>
            </div>
        </div>
    </section>
@endsection
