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

                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="exampleFormControlTextarea1">Role</label>
                                        <select name="role_id" class="form-control select2">
                                            <option value=""></option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="exampleFormControlTextarea1">Jabatan</label>
                                        <select name="jabatan_id" class="form-control select2">
                                            <option value=""></option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" class="form-control select2">
                                            <option value=""></option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" class="form-control" name="tanggal_bergabung">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no_hp">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control select2">
                                            <option value=""></option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <a href="{{ url('main/user') }}" class="btn btn-danger btn-block">Kembali</a>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <button type="reset" class="btn btn-default btn-block">Reset</button>
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
@endsection
