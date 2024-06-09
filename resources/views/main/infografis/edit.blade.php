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

                            <form action="{{ route('infografis.update', $result->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nama</label>
                                    <input type="text"class="form-control" name="nama" value="{{ $result->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Penanggung Jawab</label>
                                    <input type="text"class="form-control" name="penanggung_jawab"
                                        value="{{ $result->penanggung_jawab }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control" required>{{ $result->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="gambar">Dokumen</label>
                                    <input type="file" class="form-control-file" name="gambar">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="gambar">Dokumen Sebelumnya</label> <br>
                                    <a target="blank" href="{{ asset('storage/' . $result->gambar) }}">
                                        <i class="fa fa-eye"> Lihat Dokumen</i>
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('main/infografis') }}" class="btn btn-danger">Kembali</a>
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