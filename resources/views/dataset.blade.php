@extends('layout')
@section('title', 'Home page')
@section('content')
    <section class="ftco-section bg-light">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header bgcard-header">
                        <h3 class="card-title">{{ $title }}</h3>
                        <p>Temukan kumpulan data-data mentah berupa tabel yang bisa diolah lebih lanjut di sini. Satu Data
                            Sulsel menyediakan akses ke beragam koleksi dataset dari seluruh Organisasi Perangkat Daerah</p>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-lg-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> <i class="fa fa-file"></i></th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    @if (is_object($row) && isset($row->nama))
                                        <tr>
                                            <td style="width: 5%">
                                                <p>
                                                    <i class="fa fa-file"></i>
                                                </p>
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="/dataset/{{ $row->slug }}"
                                                        class="">{{ $row->nama }}</a>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="/dataset/{{ $row->slug }}" class="btn btn-warning btn-sm"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @else
                                    @endif
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
