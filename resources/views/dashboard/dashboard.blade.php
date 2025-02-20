@extends('main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <h4 class="mb-3">Dashboard</h4>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="card" style="background-color: #003788">
                    <div class="card-body">
                        <h6 class="rounded p-2 text-dark" style="background-color: #ffff">Data Suplier</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="bi bi-person-lines-fill custom-icon-size text-light"></i>
                            <h3 class="mx-2 text-light">77</h3>
                        </div>
                        <div class="text-end mt-2">
                            <a href="{{ url('/suplier') }}" class="btn btn_info">Lihat Data <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="card" style="background-color: #003788">
                    <div class="card-body">
                        <h6 class="rounded p-2 text-dark" style="background-color: #ffff">Total Pelanggan</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="bi bi-people custom-icon-size text-light"></i>
                            <h3 class="mx-2 text-light">99</h3>
                        </div>
                        <div class="text-end mt-2">
                            <a href="{{ url('/pelanggan') }}" class="btn btn_info">Lihat Data <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="card" style="background-color: #003788">
                    <div class="card-body">
                        <h6 class="rounded p-2 text-dark" style="background-color: #ffff">Data Stok</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="bi bi-bag-check custom-icon-size text-light"></i>
                            <h3 class="mx-2 text-light">97</h3>
                        </div>
                        <div class="text-end mt-2">
                            <a href="{{ url('/stok') }}" class="btn btn_info">Lihat Data <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="card" style="background-color: #003788">
                    <div class="card-body">
                        <h6 class="rounded p-2 text-dark" style="background-color: #ffff">Total Pendapatan</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="bi bi-people-fill custom-icon-size text-light"></i>
                            <h3 class="mx-2 text-light">75</h3>
                            {{-- <h3 class="mx-2 text-light">{{ 'Rp ' . number_format($totalPendapatam, 0, ',', '.') }}</h3> --}}
                        </div>
                        <div class="text-end mt-2">
                            <a href="{{ url('/barang-keluar') }}" class="btn btn_info">Lihat Data <i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            background-color: #F0EBEB;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1.5rem;
            color: #6c757d;
        }
        .btn_info{
            background-color: #003788;
            color: #fff;
            border-radius: 5px;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }
        .btn_info:hover {
            background-color: #FFFFFF;
            color: #000000;
        }
        .custom-icon-size {
            font-size: 30px; /* Adjust the size as needed */
        }
    </style>
@endsection
