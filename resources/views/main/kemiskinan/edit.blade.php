@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('kemiskinan.update', $result->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <dv class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $result->nama }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="slug">slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ $result->slug }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="penanggung_jawab">Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="penanggung_jawab"
                                            name="penanggung_jawab" value="{{ $result->penanggung_jawab }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $result->deskripsi }}</textarea>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" class="form-control" id="bulan" name="bulan"
                                            value="{{ $result->bulan }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="file_excel">file_excel</label>
                                        <input type="file" class="form-control" id="file_excel" name="file_excel"
                                            value="{{ $result->file_excel }}">
                                    </div>
                                    @if (Auth::user()->role_id == '1')
                                        <div class="col-sm-12 mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control select2">
                                                <option value=""></option>
                                                <option value="Ajukan" {{ $result->status == 'Ajukan' ? 'selected' : '' }}>
                                                    Ajukan</option>
                                                <option value="Diterima"
                                                    {{ $result->status == 'Diterima' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="Ditolak"
                                                    {{ $result->status == 'Ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                    @else
                                    @endif
                                    <div class="col-sm-6 mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ url('main/kemiskinan') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </dv>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
