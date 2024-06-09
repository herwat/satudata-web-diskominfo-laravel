@extends('layout')
@section('title', 'Home page')
@section('content')

    <section class="ftco-section bg-light">
        <div class="card">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-12">
                        <h1>Pelajari mengenai Open Data</h1>
                        <p>Bantuan dan Dokumentasi mengenai Open Data</p>
                        <hr>
                    </div>
                    @foreach ($bantuan as $item)
                        <button type="button" class="collapsible">{{ $item->nama }}</button>
                        <div class="content">
                            <p>{!! $item->deskripsi !!}.</p>
                        </div>
                    @endforeach

                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
@endsection
