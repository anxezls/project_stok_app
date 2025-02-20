@extends('main')

@section('title')
Stok
@endsection

@section('content')
    <div class = "container-fluid" > <h3 class="mt-2 mb-3">Data Stok</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="">Data Stok</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Data Stok</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>Form</strong> Tambah Stok
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="kode_barang">Kode Barang</label>
                                        <div class="input-group">
                                            <span class="text-white input-group-text bg-primary"><i class="bi bi-upc-scan"></i></span>
                                            <input type="text" value="{{ old('kode_barang') }}" name="kode_barang" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Masukkan Kode Barang...."/>
                                            @error('kode_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="nama_barang">Nama Barang</label>
                                        <div class="input-group">
                                            <span class="text-white input-group-text bg-primary"><i class="bi bi-box-seam"></i></span>
                                            <input type="text" value="{{ old('nama_barang') }}" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang...."/>
                                            @error('nama_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="harga">Harga Barang</label>
                                <div class="input-group">
                                    <span class="text-white input-group-text bg-primary"><i class="bi bi-cash-coin"></i></span>
                                    <input type="text" value="{{ old('harga') }}" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga List Barang...."/>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="stok">Stok Barang</label>
                                        <div class="input-group">
                                            <span class="text-white input-group-text bg-primary"><i class="bi bi-upc-scan"></i></span>
                                            <input type="text" value="{{ old('stok') }}" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok Barang...."/>
                                            @error('stok')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="suplier"> Suplier</label>
                                        <div class="input-group">
                                            <span class="input-group-text text-light bg-primary"><i class="bi bi-person-bounding-box"></i></span>
                                            <select name="suplier" class="form-control @error('suplier') is-invalid @enderror" id="suplier">
                                                <option value="">--Pilih Suplier--</option>
                                                @foreach ($getSuplier as $item)
                                                    <option value="{{ $item->id }}" {{ old('suplier') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_suplier }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('suplier')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="cabang">Cabang</label>
                                <div class="input-group">
                                    <span class="input-group-text text-light bg-primary"><i class="bi bi-map"></i></span>
                                    <input type="text" value="" name="cabang" id="cabang" class="form-control @error('cabang') is-invalid @enderror"/>
                                    @error('cabang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="container-fluid text-end">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
