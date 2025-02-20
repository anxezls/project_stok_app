@extends('main')

@section('title')
    Barang Masuk
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mb-3 mt-2">Barang Masuk</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/barang-masuk') }}">Barang Masuk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Barang Masuk</li>
            </ol>
        </nav>

        <div class="card">
            <form action="" method="post">
                @csrf
                <div class="card-header">
                    <strong>Form </strong> barang masuk
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="tanggal_faktur">Tanggal Faktur</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-calendar-week"></i></span>
                                    <input type="date" value="{{ old('tanggal_faktur') }}" name="tanggal_faktur" id="tanggal_faktur" class="form-control @error('tanggal_faktur') is-invalid @enderror" placeholder="Masukkan tanggal_faktur Barang...."/>
                                    @error('tanggal_faktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nama_barang_id"> Nama Barang</label>
                                <div class="input-group">
                                    <span class="input-group-text text-light bg-primary"><i class="bi bi-person-bounding-box"></i></span>
                                    <select name="nama_barang_id" class="form-control @error('nama_barang_id') is-invalid @enderror" id="nama_barang_id">
                                        <option value="">--Pilih Nama Barang--</option>
                                        @foreach ($getnama_barang_id as $item)
                                            <option value="{{ $item->id }}" {{ old('nama_barang_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->kode_barang }} ===> {{ $item->nama_barang }}  ===> {{ $item->getSuplier->nama_suplier }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_barang_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="harga">Harga Barang</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-cash-coin"></i></span>
                                    <input type="number" value="{{ old('harga') }}" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga List Barang...."/>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="jumlah">jumlah Barang</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-123"></i></span>
                                    <input type="number" value="{{ old('jumlah') }}" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan jumlah Barang...."/>
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <input hidden type="text" name="cabang" value="Palembang">

                    {{-- <input hidden type="text" name="suplier_id" value="{{  }}"> --}}

                    <div class="container-fluid text-end">
                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="bi bi-plus"></i> input
                        </button>

                        <button type="reset" class="btn btn-warning btn-md">
                            <i class="bi bi-x"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
