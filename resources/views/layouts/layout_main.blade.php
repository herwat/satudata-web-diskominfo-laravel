<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ url('logo_sulsel.png') }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    {{-- select 2 css tambah  --}}
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet"
        href="{{ url('adminlte') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet"
        href="{{ url('adminlte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/dropzone/min/dropzone.min.css">

</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ url('#') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('main/home') }}" class="nav-link">Dashboard
                    </a>

                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                @php
                    use Illuminate\Support\Str;
                @endphp

                <!-- Notifications Dropdown Menu -->
                @if (Auth::user()->role_id == '1')
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <!-- Menampilkan jumlah notifikasi langsung di sini -->
                            @php
                                $ekonomiCount = DB::table('ekonomis')->where('status', 'Ajukan')->count();
                                $kemiskinanCount = DB::table('kemiskinans')->where('status', 'Ajukan')->count();
                                $kependudukanCount = DB::table('kependudukans')->where('status', 'Ajukan')->count();
                                $lingkunganCount = DB::table('linkungan_hidups')->where('status', 'Ajukan')->count();
                                $pemerintahanCount = DB::table('pemerintahans')->where('status', 'Ajukan')->count();
                                $pendidikanCount = DB::table('pendidikans')->where('status', 'Ajukan')->count();
                                $sosialCount = DB::table('sosials')->where('status', 'Ajukan')->count();

                                $totalNotifications =
                                    $ekonomiCount +
                                    $kemiskinanCount +
                                    $kependudukanCount +
                                    $lingkunganCount +
                                    $pemerintahanCount +
                                    $pendidikanCount +
                                    $sosialCount;
                            @endphp
                            <span class="badge badge-warning navbar-badge">
                                {{ $totalNotifications }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">Notifications</span>
                            <div class="dropdown-divider"></div>
                            <!-- Menampilkan notifikasi langsung dari query di dalam view -->
                            @php
                                $notifications = DB::table('ekonomis')
                                    ->where('status', 'Ajukan')
                                    ->select('id', 'nama', 'status', 'created_at', DB::raw("'ekonomi' as type"))
                                    ->union(
                                        DB::table('kemiskinans')
                                            ->where('status', 'Ajukan')
                                            ->select(
                                                'id',
                                                'nama',
                                                'status',
                                                'created_at',
                                                DB::raw("'kemiskinan' as type"),
                                            ),
                                    )
                                    ->union(
                                        DB::table('kependudukans')
                                            ->where('status', 'Ajukan')
                                            ->select(
                                                'id',
                                                'nama',
                                                'status',
                                                'created_at',
                                                DB::raw("'kependudukan' as type"),
                                            ),
                                    )
                                    ->union(
                                        DB::table('linkungan_hidups')
                                            ->where('status', 'Ajukan')
                                            ->select(
                                                'id',
                                                'nama',
                                                'status',
                                                'created_at',
                                                DB::raw("'lingkungan' as type"),
                                            ),
                                    )
                                    ->union(
                                        DB::table('pemerintahans')
                                            ->where('status', 'Ajukan')
                                            ->select(
                                                'id',
                                                'nama',
                                                'status',
                                                'created_at',
                                                DB::raw("'pemerintahan' as type"),
                                            ),
                                    )
                                    ->union(
                                        DB::table('pendidikans')
                                            ->where('status', 'Ajukan')
                                            ->select(
                                                'id',
                                                'nama',
                                                'status',
                                                'created_at',
                                                DB::raw("'pendidikan' as type"),
                                            ),
                                    )
                                    ->union(
                                        DB::table('sosials')
                                            ->where('status', 'Ajukan')
                                            ->select('id', 'nama', 'status', 'created_at', DB::raw("'sosial' as type")),
                                    )
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                            @endphp

                            @foreach ($notifications as $notification)
                                @php
                                    $url = '';
                                    switch ($notification->type) {
                                        case 'ekonomi':
                                            $url = url('main/ekonomi/' . $notification->id);
                                            break;
                                        case 'kemiskinan':
                                            $url = url('main/kemiskinan/' . $notification->id);
                                            break;
                                        case 'kependudukan':
                                            $url = url('main/kependudukan/' . $notification->id);
                                            break;
                                        case 'lingkungan':
                                            $url = url('main/lingkungan/' . $notification->id);
                                            break;
                                        case 'pemerintahan':
                                            $url = url('main/pemerintahan/' . $notification->id);
                                            break;
                                        case 'pendidikan':
                                            $url = url('main/pendidikan/' . $notification->id);
                                            break;
                                        case 'sosial':
                                            $url = url('main/sosial/' . $notification->id);
                                            break;
                                        default:
                                            $url = url('main/notifications');
                                            break;
                                    }
                                @endphp
                                <a href="{{ $url . '/edit' }}" class="dropdown-item">
                                    <i class="fas fa-bell mr-2"></i>
                                    {{ Str::limit($notification->nama, 20) }}
                                    <p>Data {{ $notification->type }} <br>{{ $notification->created_at }}</p>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach

                            <!-- Akhir notifikasi -->
                            <a href="{{ url('main/ekonomi') }}" class="dropdown-item dropdown-footer">See All
                                Notifications</a>
                        </div>
                    </li>
                @endif
                <!-- Notifications Dropdown Menu Admin-->
                <!-- Notifications Dropdown Menu Pegawai-->
                @if (Auth::user()->role_id == '2')

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <!-- Menampilkan jumlah notifikasi langsung di sini -->
                            <span class="badge badge-warning navbar-badge">
                                @php
                                    $today = today();
                                    $count = DB::table('pengingats')
                                        ->where('status', 'Remind')
                                        ->where('tenggat_waktu', '>=', $today)
                                        ->count();
                                @endphp
                                {{ $count }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">Notifications</span>
                            <div class="dropdown-divider"></div>
                            <!-- Menampilkan notifikasi langsung dari query di dalam view -->
                            @php
                                $today = today();
                            @endphp
                            @foreach (DB::table('pengingats')->join('users', 'pengingats.user_id', '=', 'users.id')->where('pengingats.status', 'Remind')->where('tenggat_waktu', '>=', $today)->get() as $pengingat)
                                <a href="{{ url('main/pengingat') }}" class="dropdown-item">
                                    <i class="fas fa-bell mr-2"></i>
                                    To {{ $pengingat->name }}
                                    <p>Reminder Upload Data</p>
                                    <p>Silahkan Upload Data mengenai {{ $pengingat->topik }} paling lambat tanggal
                                        {{ $pengingat->tenggat_waktu }}</p>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach

                            <!-- Akhir notifikasi -->
                            <a href="{{ url('main/pengingat') }}" class="dropdown-item dropdown-footer">See All
                                Notifications</a>
                        </div>
                    </li>
                @endif
                <!-- Notifications Dropdown Menu Pegawai-->



                <!-- Logout -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="{{ url('#') }}">
                        <i class="fa fa-outdent"></i>
                        <b>{{ auth()->user()->name }}</b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ url('#') }}" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ auth()->user()->name }}
                                    </h3>
                                    <p class="text-sm">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('logout') }}" class="dropdown-item dropdown-footer">Log Out </a>
                    </div>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="{{ url('#') }}" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('main/home') }}" class="brand-link">
                <img src="{{ url('logo_sulsel.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DataStat </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('storage/' . auth()->user()->gambar) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <span>{{ auth()->user()->name }} <br>{{ auth()->user()->nip }} </span>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('main/home') }}"
                                class="nav-link {{ Request::is('main/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        {{-- ADMINISTRATOR  --}}
                        @if (Auth::user()->role_id == '1')
                            {{-- DATA MASTER  --}}
                            <li class="nav-item">
                                <a href="{{ url('main/profile') }}"
                                    class="nav-link {{ Request::is('main/profile*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengingat') }}"
                                    class="nav-link {{ Request::is('main/pengingat*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>
                                        Pengingat
                                    </p>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::is('main/role*') || Request::is('main/footer*') || Request::is('main/jabatan*') || Request::is('main/unit*') || Request::is('main/user*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Request::is('main/role*') || Request::is('main/footer*') || Request::is('main/jabatan*') || Request::is('main/unit*') || Request::is('main/user*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('main/footer') }}"
                                            class="nav-link {{ Request::is('main/footer*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data footer
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/role') }}"
                                            class="nav-link {{ Request::is('main/role*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Role
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/jabatan') }}"
                                            class="nav-link {{ Request::is('main/jabatan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Jabatan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/user') }}"
                                            class="nav-link {{ Request::is('main/user*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pegawai
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- DATA MASTER END --}}
                            {{-- Bantuan & Infografis --}}
                            <li
                                class="nav-item {{ Request::is('main/bantuan*') || Request::is('main/infografis*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Request::is('main/bantuan*') || Request::is('main/infografis*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-info"></i>
                                    <p>
                                        Bantuan & Infografis
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('main/bantuan') }}"
                                            class="nav-link {{ Request::is('main/bantuan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Bantuan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/infografis') }}"
                                            class="nav-link {{ Request::is('main/infografis*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Infografis
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- Bantuan & Infografis END --}}
                            {{-- DataSet --}}
                            <li
                                class="nav-item {{ Request::is('main/ekonomi*') || Request::is('main/sosial*') || Request::is('main/pendidikan*') || Request::is('main/pemerintahan*') || Request::is('main/lingkungan*') || Request::is('main/kependudukan*') || Request::is('main/kemiskinan*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Request::is('main/ekonomi*') || Request::is('main/sosial*') || Request::is('main/pendidikan*') || Request::is('main/pemerintahan*') || Request::is('main/lingkungan*') || Request::is('main/kependudukan*') || Request::is('main/kemiskinan*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        DataSet
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('main/ekonomi') }}"
                                            class="nav-link {{ Request::is('main/ekonomi*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data ekonomi
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/kemiskinan') }}"
                                            class="nav-link {{ Request::is('main/kemiskinan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data kemiskinan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/kependudukan') }}"
                                            class="nav-link {{ Request::is('main/kependudukan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data kependudukan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/lingkungan') }}"
                                            class="nav-link {{ Request::is('main/lingkungan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Lingkungan H
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/pemerintahan') }}"
                                            class="nav-link {{ Request::is('main/pemerintahan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pemerintahan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/pendidikan') }}"
                                            class="nav-link {{ Request::is('main/pendidikan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pendidikan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/sosial') }}"
                                            class="nav-link {{ Request::is('main/sosial*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Sosial
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- DataSet END --}}
                        @endif

                        {{-- ADMINISTRATOR END  --}}
                        {{-- PEGAWAI  --}}
                        @if (Auth::user()->role_id == '2')
                            {{-- PROFILE  --}}
                            <li class="nav-item">
                                <a href="{{ url('main/profile') }}"
                                    class="nav-link {{ Request::is('main/profile*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('main/pengingat') }}"
                                    class="nav-link {{ Request::is('main/pengingat*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>
                                        Pengingat
                                    </p>
                                </a>
                            </li>
                            {{-- PROFILE END --}}
                            {{-- Infographic  --}}
                            <li class="nav-item">
                                <a href="{{ url('main/infografis') }}"
                                    class="nav-link {{ Request::is('main/infografis*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Infografis
                                    </p>
                                </a>
                            </li>
                            {{-- Infographic  --}}

                            {{-- DataSet --}}
                            <li
                                class="nav-item {{ Request::is('main/ekonomi*') || Request::is('main/sosial*') || Request::is('main/pendidikan*') || Request::is('main/pemerintahan*') || Request::is('main/lingkungan*') || Request::is('main/kependudukan*') || Request::is('main/kemiskinan*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Request::is('main/ekonomi*') || Request::is('main/sosial*') || Request::is('main/pendidikan*') || Request::is('main/pemerintahan*') || Request::is('main/lingkungan*') || Request::is('main/kependudukan*') || Request::is('main/kemiskinan*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        DataSet
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('main/ekonomi') }}"
                                            class="nav-link {{ Request::is('main/ekonomi*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data ekonomi
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/kemiskinan') }}"
                                            class="nav-link {{ Request::is('main/kemiskinan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data kemiskinan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/kependudukan') }}"
                                            class="nav-link {{ Request::is('main/kependudukan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data kependudukan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/lingkungan') }}"
                                            class="nav-link {{ Request::is('main/lingkungan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Lingkungan H
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/pemerintahan') }}"
                                            class="nav-link {{ Request::is('main/pemerintahan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pemerintahan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/pendidikan') }}"
                                            class="nav-link {{ Request::is('main/pendidikan*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pendidikan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('main/sosial') }}"
                                            class="nav-link {{ Request::is('main/sosial*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Sosial
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- DataSet END --}}
                        @endif
                        {{-- PEGAWAI END --}}

                        {{-- USER BIASA  --}}
                        @if (Auth::user()->role_id == '3')
                            {{-- PROFILE  --}}
                            <li class="nav-item">
                                <a href="{{ url('main/profile') }}"
                                    class="nav-link {{ Request::is('main/profile*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                            {{-- PROFILE END --}}
                        @endif
                        {{-- USER BIASA END --}}

                        {{-- Menu User END --}}


                    </ul>
                </nav>
                <!-- Sidebar Menu End -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }} </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('main/home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $title }} </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <br>
        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="col-lg-12">
                <center>
                    <img style="width: 900px;height:50px;" src="{{ asset('footer.svg') }}" alt="">
                </center>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('adminlte') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('adminlte') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ url('adminlte') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('adminlte') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('adminlte') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard.js"></script>

    <!-- Bootstrap 4 -->
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
    <!-- Select2 -->
    <script src="{{ url('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Select2 -->
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="{{ url('adminlte') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ url('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- BS-Stepper -->
    <script src="{{ url('adminlte') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="{{ url('adminlte') }}/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <!-- Summernote -->
    <script src="{{ url('adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    @yield('script')
</body>

</html>
