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

                            <form action="{{ route('user.update', $result->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip"
                                            value="{{ $result->nip }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $result->name }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $result->email }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="jabatan_id">Jabatan</label>
                                        <select class="form-control select2" id="jabatan_id" name="jabatan_id">
                                            <option value=""></option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $result->jabatan_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="role_id">Role</label>
                                        <select class="form-control select2" id="role_id" name="role_id">
                                            <option value=""></option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $result->role_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control select2" id="jk" name="jk">
                                            <option value=""></option>
                                            <option value="Laki-laki" {{ $result->jk == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ $result->jk == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $result->tempat_lahir }}">
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ $result->tanggal_lahir }}">
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3">{{ $result->alamat }}</textarea>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" class="form-control" name="tanggal_bergabung"
                                            value="{{ $result->tanggal_bergabung }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no_hp"
                                            value="{{ $result->no_hp }}">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control-file" name="gambar">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="gambar">Gambar Sebelumnya</label> <br>
                                        <a target="blank" href="{{ asset('storage/' . $result->gambar) }}">
                                            <img style="height: 100px;width:100px;"
                                                src="{{ asset('storage/' . $result->gambar) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control select2" id="status" name="status">
                                            <option value=""></option>
                                            <option value="Aktif" {{ $result->status == 'Aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="Tidak Aktif"
                                                {{ $result->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
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
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ url('main/user') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <span class="card-header" style="color: red">Kosongkan password jika tidak ingin
                                            merubah password</span>
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
