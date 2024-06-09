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

                            <form action="{{ route('profile.update', $dataUser->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip"
                                            value="{{ $dataUser->nip }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $dataUser->name }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $dataUser->email }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control select2" id="jk" name="jk">
                                            <option value=""></option>
                                            <option value="L" {{ $dataUser->jk == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ $dataUser->jk == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $dataUser->tempat_lahir }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ $dataUser->tanggal_lahir }}">
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3">{{ $dataUser->alamat }}</textarea>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" class="form-control" name="tanggal_bergabung"
                                            value="{{ $dataUser->tanggal_bergabung }}" disabled>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no_hp"
                                            value="{{ $dataUser->no_hp }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control-file" name="gambar">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="gambar">Gambar Sebelumnya</label> <br>
                                        <a target="blank" href="{{ asset('storage/' . $dataUser->gambar) }}">
                                            <img style="height: 100px;width:100px;"
                                                src="{{ asset('storage/' . $dataUser->gambar) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control select2" id="status" name="status" disabled>
                                            <option value=""></option>
                                            <option value="Aktif" {{ $dataUser->status == 'Aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="Tidak Aktif"
                                                {{ $dataUser->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="form-control" name="new_password"
                                            placeholder="*********">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="confirm_password">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="confirm_password"
                                            placeholder="********">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        Kosongkan password jika tidak ingin
                                        merubah password
                                    </div>
                                    {{-- aksi  --}}
                                    <div class="col-sm-12 mb-3">
                                        <hr>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <a href="{{ url('main/profile') }}" class="btn btn-danger btn-block">Kembali</a>
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
