@extends('main')

@section('title')
    Stok
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 mb-3">Data Stok</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Stok</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col">
                <div class="mt-3 card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="pt-1 w-100">
                                <strong>Data Stok</strong>
                            </div>
                            <div class="w-100 text-end">
                                <a href="{{url('/stok')}}" class="btn btn-outline-primary btn-sm">
                                    Refresh Data <i class="bi bi-arrow-clockwise"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-success" id="flash-message">
                               <strong> {{Session::get('message')}} </strong>
                            </div>
                            <script>
                                setTimeout(function (){
                                    document.getElementById('flash-message').style.display='none';
                                }, {{ session('timeout', 5000) }});
                            </script>
                        @endif

                        <div class="mx-3 my-4 row">
                            <div class="col-6 bg-">
                                <a href="{{ url('/stok/add') }}" class="btn btn-primary btn-sm">
                                    Stok Baru <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                            <div class="col-6">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Cari Nama Barang ...">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="20px">No</th>
                                    <th class="text-center bg-" width="100px">Kode</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="bg-">Harga List</th>
                                    <th class="text-center bg-">Stok</th>
                                    <th class="bg-">Suplier</th>
                                    <th class="text-center bg-">Cabang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getData as $item)
                                    <tr style="background-color: #434343">
                                        <td class="text-center">
                                            {{ (($getData->currentPage() - 1) * $getData->perPage()) + $loop->iteration }}
                                        </td>
                                        <td class="text-center">
                                            <p class="bg-success rounded-5 text-light">
                                                {{ $item->kode_barang }}
                                            </p>
                                        </td>
                                        <td width="550px">{{ $item->nama_barang }} </td>
                                        <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }} </td>
                                        <td class="text-center">{{ $item->stok }} </td>
                                        <td>{{ $item->getSuplier->nama_suplier }} </td>
                                        <td class="text-center">{{ $item->cabang }} </td>
                                        <td class="text-center">
                                            <a href="{{ url('/stok/edit') }}/{{ $item->id }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="{{ url('/stok', ['id' => $item->id]) }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus Data {{ $item->nama_suplier }} ??');">
                                                <i class="bi bi-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $getData->links() }} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
