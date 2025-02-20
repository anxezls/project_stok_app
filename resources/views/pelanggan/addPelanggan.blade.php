@extends('main')

@section('title')
    Data Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 mb-3">Data Pelanggan</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/pelanggan') }}">Data Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Data Pelanggan</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>Form</strong> Tambah Data
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-4 form-outline">
                                <label class="form-label" for="nama_pelanggan">Nama Pelanggan</label>
                                <div class="input-group">
                                    <span class="text-white input-group-text bg-primary"><i class="bi bi-person"></i></span>
                                    <input type="text" value="{{ old('nama_pelanggan') }}" name="nama_pelanggan" id="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" placeholder="Masukkan Nama Pelanggan..."/>
                                    @error('nama_pelanggan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="telp">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="text-white input-group-text bg-primary"><i class="bi bi-phone"></i></span>
                                    <input type="number" value="{{ old('telp') }}" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="Masukkan Nomor Telepon Pelanggan..."/>
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="input-group">
                                  <select value="{{ old('jenis_kelamin') ?? '' }}" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                  </select>
                                  <span class="input-group-text"><i class="bi bi-caret-down-fill"></i></span>
                                </div>
                                @error('jenis_kelamin')
                                  <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="alamat">Alamat</label>
                                <div class="input-group">
                                    <span class="text-white input-group-text bg-primary"><i class="bi bi-map"></i></span>
                                    <textarea name="alamat" id="" cols="10" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Pelanggan..."></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col">
                                    <label class="form-label" for="kota">Kota</label>
                                    <div class="input-group">
                                        <span class="text-white input-group-text bg-primary"><i class="bi bi-pin"></i></span>
                                        <input type="text" value="{{ old('kota') }}" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" placeholder="Masukkan Kota..."/>
                                        @error('kota')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="provinsi">Provinsi</label>
                                    <div class="input-group">
                                        <span class="text-white input-group-text bg-primary"><i class="bi bi-map"></i></span>
                                        <input type="text" value="{{ old('provinsi') }}" name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror" placeholder="Masukkan Provinsi..."/>
                                        @error('provinsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid text-end">
                                <button type="submit" class="btn btn-outline-primary rounded-5">
                                    <i class="bi bi-plus"></i> Input
                                </button>
                                <button type="reset" class="btn btn-outline-warning rounded-5">
                                    <i class="bi bi-x"></i> Reset
                                </button>

                                <a href="{{ url('/pelanggan') }}" class="btn btn-outline-success rounded-5">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
