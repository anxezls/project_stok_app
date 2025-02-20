@extends('main')

@section('title')
Barang Keluar
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="mt-2 mb-3">Barang Keluar</h3>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/barang-keluar') }}">Barang Keluar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proses Barang Keluar</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <strong>New Transaction</strong>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <p>Kode Transaksi :
                                    @if(isset($kode_transaksi))
                                        <strong>{{ $kode_transaksi }}</strong>
                                        <input hidden type="text" name="kode_transaksi" value="{{ $kode_transaksi }}">
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 form-outline">
                                    <label class="form-label" for="tgl_faktur">Tanggal Faktur</label>
                                    <div class="input-group">
                                        <input type="date" value="{{ old('tgl_faktur') }}" name="tgl_faktur" id="tgl_faktur" class="form-control @error('tgl_faktur') is-invalid @enderror" placeholder="Masukkan tgl_faktur Barang...."/>
                                        @error('tgl_faktur')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 form-outline">
                                    <label class="form-label" for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                                    <div class="input-group">
                                        <input type="date" value="{{ old('tgl_jatuh_tempo') }}" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" class="form-control @error('tgl_jatuh_tempo') is-invalid @enderror" placeholder="Masukkan tgl_jatuh_tempo Barang...."/>
                                        @error('tgl_jatuh_tempo')
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
                                <div class="mb-4 form-outline">
                                    <label class="form-label" for="pelanggan_id"> Nama Pelanggan</label>
                                    <div class="input-group">
                                        <span class="input-group-text text-light bg-primary"><i class="bi bi-person-bounding-box"></i></span>
                                        <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id">
                                            <option value="">--pelanggan--</option>
                                            @foreach ($pelanggan as $item)
                                                <option value="{{ $item->id }}" {{ old('pelanggan_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_pelanggan }} ===> {{ $item->kota}} ===> Telp: {{ $item->telp }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pelanggan_id')
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
                                <div class="mb-4 form-outline">
                                    <label class="form-label" for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('jenis_pembayaran') is-invalid @enderror" type="radio" name="jenis_pembayaran" id="tunai" value="Tunai" {{ old('jenis_pembayaran') == 'Tunai' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tunai">Tunai</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('jenis_pembayaran') is-invalid @enderror" type="radio" name="jenis_pembayaran" id="kredit" value="Kredit" {{ old('jenis_pembayaran') == 'Kredit' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kredit">Kredit</label>
                                        </div>
                                    </div>
                                    @error('jenis_pembayaran')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="container-fluid text-end">
                            <button type="submit" class="btn btn-secondary btn-sm">Input <i class="bi bi-plus"></i></button>
                            <a href="{{ url('/barang-keluar') }}" class="btn btn-warning btn-sm">Cancel <i class="bi bi-x"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
