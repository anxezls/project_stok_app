<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>
    <!-- Bootstrap Assets CSS -->

    {{-- NOTICE THIS --}}
    <link rel="stylesheet" href="{{ url('assets/bootstrap5/css/bootstrap.min.css') }}">


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Bootstrap ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://kit.fontawesome.com/f181524b5b.js" crossorigin="anonymous"></script>

    <style>
        body {
            position: relative;
        }
        .side:hover {
            background-color: #154893;
            padding-block: false;
        }
        .navbar {
            background-color: #1B54A9;
        }
        .navbar-brand {
            margin-left: 20px;
            font-size: 25px;
            font-weight: 600;
        }
        .clr {
            background-color: #003788;
            box-shadow: 10px 10px 20px 5px rgb(194, 194, 194);

        }
        .head {
            color: #ffffff;
        }
        .head:hover {
            color: #ffffff;
        }
        .content-wrap {
            min-height: 100%;
            padding-bottom: 50px;
        }
        footer {
            background-color: #616161;
            color: #fff;
            height: 50px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
        .foot{
            margin-bottom: 150px;
        }
        .dropHover:hover{
            color: #fff;
            background-color: #001C45;
        }
        .nav-link.active {
            background-color: #001C45; /* Adjust to your desired active background color */
            color: white !important; /* Ensure the text color is visible */
        }

    </style>
</head>

<body>
<div class="d-flex">
    <div class="clr max-height-vh-100 min-vh-100" >
        <nav class="nav flex-column">
            <div class="container mt-3" style="padding-right: 50px">
                <a class="head navbar-brand mt-3" href="#">
                    <img src="{{ url('/assets/images/laravel.png') }}" height="60">
                    GPA109
                </a>
                <h3 class="head m-3"></h3>
            </div>

            <!-- Menu Side Bar -->
                {{-- Menu Dahboard --}}
                <a href="{{ url('/dashboard') }}" class="px-1 side nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }} text-light">
                    <i class="bi bi-house-fill mx-2"></i> Dashboard
                </a>

                {{-- Menu Pegawai --}}
                <a href="{{ url('/pegawai') }}" class="px-1 side nav-item nav-link {{ Request::is('pegawai') ? 'active' : '' }} text-light">
                    <i class="fa-solid fa-key mx-2"></i> Pegawai
                </a>

                {{-- Menu Data Barang --}}
                <div class="px-3 pt-3 text-decoration-none text-light"><strong>Barang</strong></div>
                    <a href="{{ url('/stok') }}" class="px-4 side nav-item nav-link {{ Request::is('stok') ? 'active' : '' }} text-light">
                        <i class="bi bi-file-bar-graph mx-2"></i> Stok
                    </a>
                    <a href="{{ url('/barang-masuk') }}" class="px-4 side nav-item nav-link {{ Request::is('barang-masuk') ? 'active' : '' }} text-light">
                        <i class="bi bi-arrow-right mx-2"></i> Barang Masuk
                    </a>
                    <a href="{{ url('/barang-keluar') }}" class="px-4 side nav-item nav-link {{ Request::is('barang-keluar') ? 'active' : '' }} text-light">
                        <i class="bi bi-arrow-left mx-2"></i> Barang Keluar
                    </a>


                <a href="{{ url('/pelanggan') }}" class="px-1 pt-3 side nav-item nav-link {{ Request::is('pelanggan') ? 'active' : '' }} text-light">
                    <i class="bi bi-house-fill mx-2"></i> Pelanggan
                </a>
                <a href="{{ url('/suplier') }}" class="px-1 side nav-item nav-link {{ Request::is('suplier') ? 'active' : '' }} text-light">
                    <i class="bi bi-cart4 mx-2"></i> Suplier
                </a>


                {{-- Menu Logout --}}
                <a href="{{ url('/logout') }}" class="px-1 side nav-item nav-link text-light mt-4">
                    <i class="fa-solid fa-power-off mx-2"></i> Logout
                </a>
        </nav>
    </div>

    <div class="col">
        <nav class="navbar navbar-dark navbar-expand-lg border-left-1">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <button id="toggleMenuBtn" class="btn btn-light me-2"><i class="fas fa-bars"></i></button>

                    <a class="navbar-brand" href="">
                        {{-- Hai {{Auth()->User()->email}} --}}
                    </a>
                </div>
            </div>

        </nav>

        <div class="mx-2 p-1 foot">
            <!-- Yield -->
            @Yield('content')
        </div>

        <footer class="text-center p-3">
            &copy; 2024 GPA109A - Apps Stok Barang All rights reserved.
        </footer>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="{{ url('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleMenuBtn = document.getElementById('toggleMenuBtn');
        const sidebar = document.querySelector('.clr');

        toggleMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('d-none');
        });
    });
</script>
</body>
</html>
