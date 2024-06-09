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

                            <form action="{{ route('pengingat.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="datetime-local" class="form-control" name="waktu" required>
                                </div>
                                <div class="form-group">
                                    <label for="tenggat_waktu">Tenggat Waktu</label>
                                    <input type="datetime-local" class="form-control" name="tenggat_waktu" required>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">User ID</label>
                                    <select name="user_id" id="user_id" class="form-control select2">
                                        <option value=""></option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="topik">Topik</label>
                                    <input type="text" class="form-control" name="topik" required>
                                </div>
                                <div class="form-group">
                                    <label for="frekuensi">Frekuensi</label>
                                    <input type="number" class="form-control" name="frekuensi" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" name="status" value="Remind" class="form-control" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('main/pengingat') }}" class="btn btn-danger">Kembali</a>
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
