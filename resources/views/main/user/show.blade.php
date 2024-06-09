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
                                    <th>Role</th>
                                    <td> : {{ $result->role->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td> : {{ $result->jabatan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td> : {{ $result->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td> : {{ $result->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td> : {{ $result->email }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td> : {{ $result->jk }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td> : {{ $result->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td> : {{ $result->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td> : {{ $result->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bergabung</th>
                                    <td> : {{ $result->tanggal_bergabung }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor HP</th>
                                    <td> : {{ $result->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar</th>
                                    <td> :
                                        <a target="blank" href="{{ asset('storage/' . $result->gambar) }}">
                                            <img style="height: 100px;width:100px;"
                                                src="{{ asset('storage/' . $result->gambar) }}" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td> : {{ $result->status }}</td>
                                </tr>
                            </table>

                        </div>

                        <hr>
                        <a href="{{ url('main/user') }}" class="btn btn-danger">Kembali</a>
                    </div>
                    <!-- Detail Box -->
                </div>
            </div>
        </div>
    </section>
@endsection
