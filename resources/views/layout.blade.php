<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ $icon }}" class="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('landingpage/css/animate.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('landingpage/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/css/style.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        .bgcard-header {
            background-image: url('/Search-Goes-Global_A-Look-Into-Search-Engines-Around-the-World-1024x768.jpg');
            background-position: center;
            padding: 20px;
            width: 100%;
            height: 100%;
        }

        .bgcard-title {
            margin: 0;
        }

        /* colabse  */

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col d-flex align-items-center">
                    <p class="mb-0 phone">
                        <marquee behavior="5" direction="">
                            DataStat Diskominfo
                        </marquee>
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- nav  --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span>
                    <img src="{{ $icon }}" alt="" width="15%" height="50px">
                </span>
                DataStat<span>Diskominfo</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('dataset*') ? 'active' : '' }}">
                        <a href="{{ url('/dataset') }}" class="nav-link">Dataset</a>
                    </li>
                    <li class="nav-item {{ Request::is('infografis*') ? 'active' : '' }}">
                        <a href="{{ url('/infografis') }}" class="nav-link">Infografis</a>
                    </li>
                    <li class="nav-item {{ Request::is('bantuan*') ? 'active' : '' }}">
                        <a href="{{ url('/bantuan') }}" class="nav-link">Bantuan</a>
                    </li>
                    <li class="nav-item {{ Request::is('/auth/login*') ? 'active' : '' }}">
                        <a href="{{ url('/auth/login') }}" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    {{-- konten  --}}
    @yield('content')
    {{-- konten  --}}
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Happy Clients</h2>
                    <hr>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($footer as $item)
                            <div class="item">
                                <div class="testimony-wrap d-flex">
                                    <div class="text pl-4">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="fa fa-quote-left"></i>
                                        </span>
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt=""
                                            width="100%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak">
        <footer class="footer">
            {{-- <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">No Rekening Kami</h2>
                        <ul class="list-unstyled">
                            <li>
                                <table>
                                    @foreach ($norek as $item)
                                        <tr>
                                            <td style="color: white">{{ $item->nama }} </td>
                                            <td style="color: white"> : </td>
                                            <td style="color: white">{{ $item->norek }} </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">Kontak Kami</h2>
                        @foreach ($kontak as $item)
                            <ul class="list-unstyled">
                                <li>
                                    <p>
                                        <a target="blank" href="https://wa.me/{{ $item->wa }}"
                                            class="py-1 d-block">
                                            <i class="fa fa-whatsapp"> &nbsp; </i>
                                            {{ $item->wa }}
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a target="blank" href="mailto:{{ $item->email }}" class="py-1 d-block">
                                            <i class="fa fa-envelope"> &nbsp; </i>
                                            {{ $item->email }}
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a target="blank"
                                            href="https://www.google.com/maps/search/{{ $item->alamat }}"
                                            class="py-1 d-block">
                                            <i class="fa fa-map-marker"> &nbsp; &nbsp; </i>
                                            {{ $item->alamat }}
                                        </a>
                                    </p>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div> --}}
            <div class="w-100 mt-5 border-top py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-8">

                            <p class="copyright mb-0">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> | Dibuat Dengan <i class="fa fa-heart"
                                    aria-hidden="true"></i>
                                by <a href="#" target="_blank">Tim KP 2024</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ url('landingpage/js/jquery.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ url('landingpage/js/popper.min.js') }}"></script>
    <script src="{{ url('landingpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ url('landingpage/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ url('landingpage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('landingpage/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ url('landingpage/js/google-map.js') }}"></script>
    <script src="{{ url('landingpage/js/main.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('adminlte') }}/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            //Initialize Select2 Elements
            $('.select2').select2({
                placeholder: 'Pilih',
                theme: 'bootstrap4'
            })

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                placeholder: 'Pilih peminjaman_mobil',
                theme: 'bootstrap4'
            })
            $('.mobil').select2({
                placeholder: 'Pilih mobil',
                theme: 'bootstrap4'
            })
            $('.jenis_barang').select2({
                placeholder: 'Pilih jenis_barang',
                theme: 'bootstrap4'
            })
            $('.barang').select2({
                placeholder: 'Pilih barang',
                theme: 'bootstrap4'
            })
        });
    </script>


</body>

</html>
