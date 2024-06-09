@extends('layout')
@section('title', 'Home page')
@section('content')
    <div class="js-fullwidth" data-stellar-background-ratio="0.5">
        @foreach ($bground as $item)
            <img class="hero-wrap js-fullwidth" src="{{ asset('storage/' . $item->gambar) }}" alt=""
                data-stellar-background-ratio="0.5">
        @endforeach
        <div class="overlay">

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Topik Satu Data</h2>
                    <span class="subheading">New Topik</span>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('ekonomi') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('ekonomi.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('ekonomi') }}">Ekonomi</a></h3>
                            <p><a href="{{ url('ekonomi') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('kemiskinan') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('miskin.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('kemiskinan') }}">Kemiskinan</a></h3>
                            <p><a href="{{ url('kemiskinan') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('kependudukan') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('grup_kependudukan.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('kependudukan') }}">Kependudukan</a></h3>
                            <p><a href="{{ url('kependudukan') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('lingkungan') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('lingkungan-hidup.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('lingkungan') }}">Lingkungan Hidup</a></h3>
                            <p><a href="{{ url('lingkungan') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('pemerintahan') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('pemerintahan.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('pemerintahan') }}">Pemerintahan</a></h3>
                            <p><a href="{{ url('pemerintahan') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('pendidikan') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('pendidikan.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('pendidikan') }}">Pendidikan</a></h3>
                            <p><a href="{{ url('pendidikan') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{ url('sosial') }}" class="block-20 rounded">
                            <center>
                                <img class="thumbnail" style="width: 400px;height:400px;padding-top:10px;"
                                    src="{{ asset('sosial.png') }}" alt="">
                            </center>
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="{{ url('sosial') }}">Sosial</a></h3>
                            <p><a href="{{ url('sosial') }}" class="btn btn-primary">Lihat</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
