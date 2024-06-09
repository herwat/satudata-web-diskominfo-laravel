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

                            <form action="{{ route('sosial.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="nama">Judul</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="penanggung_jawab">Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="penanggung_jawab"
                                            name="penanggung_jawab" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control select2" id="bulan" name="bulan" required>
                                            <option value="">Pilih Bulan</option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="file_excel">File dataset</label>
                                        <input type="file" class="form-control" id="file_excel" name="file_excel"
                                            required>
                                    </div>

                                    @if (Auth::user()->role_id == '1')
                                        <div class="col-sm-6 mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control select2">
                                                <option value=""></option>
                                                <option value="Ajukan">Ajukan</option>
                                                <option value="Diterima">Diterima</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                        </div>
                                    @else
                                        <input type="hidden" class="form-control" name="status" value="Ajukan">
                                    @endif

                                    <div class="col-sm-6 mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ url('main/sosial') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
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
    <script>
        const nama = document.querySelector("#nama");
        const slug = document.querySelector("#slug");

        nama.addEventListener("keyup", function() {
            let preslug = nama.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
