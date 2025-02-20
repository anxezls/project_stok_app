@extends('main')

@section('title')
    Suplier
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 mb-3">Data Suplier</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Suplier</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Tambah Suplier</strong>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="nama_suplier">Nama</label>
                                        <input type="text" value="{{ old('nama_suplier') }}" name="nama_suplier" id="nama_suplier" class="form-control @error('nama_suplier') is-invalid @enderror" placeholder="Nama Suplier..."/>
                                        @error('nama_suplier')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Suplier"/>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input type="text" value="{{ old('alamat') }}" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Suplier..."/>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="telp">No. Telepon</label>
                                        <input type="text" value="{{ old('telp') }}" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="Telepon Suplier"/>
                                        @error('telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="tgl_terdaftar">Tanggal Terdaftar</label>
                                        <input type="date" value="{{ old('tgl_terdaftar') }}" name="tgl_terdaftar" id="tgl_terdaftar" class="form-control @error('tgl_terdaftar') is-invalid @enderror" placeholder="Tanggal Terdaftar Suplier"/>
                                        @error('tgl_terdaftar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 form-outline">
                                        <label class="form-label" for="status">Status Suplier</label>
                                        <div class="input-group">
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                                <option value="">Status Suplier Saat Ini?</option>
                                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            <span class="input-group-text"><i class="bi bi-caret-down-fill"></i></span>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="/suplier" class="btn btn-warning btn-sm">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
