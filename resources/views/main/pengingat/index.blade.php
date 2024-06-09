@extends('layouts.layout_main')
@section('content')
    <div class="container-fluid" style="padding-left: 1%;">
        <a href="{{ url('main/pengingat/create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <br>

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
                            <h3 class="card-title">DataTable {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Tenggat Waktu</th>
                                        <th>Pengirim | NIP</th>
                                        <th>Topik</th>
                                        <th>Frekuensi</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role_id == '1')
                                            <th>Aksi</th>
                                        @else
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $urutan = 1;
                                    @endphp
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>{{ $urutan++ }}</td>
                                            <td>{{ date('d-m-Y H:m', strtotime($row->waktu)) }}</td>
                                            <td>{{ date('d-m-Y H:m', strtotime($row->tenggat_waktu)) }}</td>
                                            <td>{{ $row->user->name }} | {{ $row->user->nip }}</td>
                                            <td>{!! $row->topik !!}</td>
                                            <td>{!! $row->frekuensi !!}</td>
                                            <td>{!! $row->status !!}</td>
                                            @if (Auth::user()->role_id == '1')
                                                <td>
                                                    <a href="/main/pengingat/{{ $row->id }}/edit"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('pengingat.destroy', $row->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm border-0"
                                                            onclick="return confirm('Are you sure?'); return false;"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                            @endif
                                        </tr>
                                    @endforeach
                            </table>
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
