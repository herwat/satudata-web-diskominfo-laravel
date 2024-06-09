@extends('layout')
@section('title', 'Home page')
@section('content')

    <section class="ftco-section bg-light">
        {{-- <div class="col-lg-12">
            <div class="card-header bgcard-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>

        </div> --}}
        <div class="card">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-12">
                        <h1>{{ $title }}</h1>
                        <p>Tampilkan hasil karya Visualisasi Data Anda di Satu Data Sulsel! Visualisasi Data terpilih akan
                            dipublikasikan untuk dapat diakses oleh pengguna Satu Data</p>
                        <hr>
                    </div>
                    @foreach ($infografis as $item)
                        <div class="col-md-3 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch">
                                <a target="_blank" href="{{ asset('storage/' . $item->gambar) }}">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="300px"
                                        height="300px">
                                </a>
                                <div class="text p-4 text-center">
                                    <h3 class="heading"><a target="_blank"
                                            href="{{ asset('storage/' . $item->gambar) }}">{{ $item->nama }}</a>
                                    </h3>
                                    <div class="meta mb-2">
                                        <div><a target="_blank"
                                                href="{{ asset('storage/' . $item->gambar) }}">{{ $item->created_at }}</a>
                                        </div>
                                        <div><a target="_blank"
                                                href="{{ asset('storage/' . $item->gambar) }}">{{ $item->penanggung_jawab }}</a>
                                        </div>
                                    </div>
                                    <p>
                                        <a href="{{ $item->deskripsi }}" target="_blank" rel="noopener noreferrer">
                                            {{ $item->deskripsi }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
