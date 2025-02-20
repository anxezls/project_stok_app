@extends('main')

@section('title')
    Transaksi
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="mb-3 mt-2">Transaksi</h3>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Transaction</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('addBarangKeluar') }}" method="post">
                        @csrf

                        <table width="100%" style="text-align: center; vertical-align: middle;">
                            <tr class="">
                                <td>Pembayaran</td>
                                <td>Tanggal Faktur</td>
                                <td>Jatuh Tempo</td>
                                <td>Nama Pelanggan</td>
                            </tr>
                            <tr>
                                <td><strong>{{ $jenis_pembayaran }}</strong></td>
                                <td><strong>{{ Carbon\Carbon::parse( $tgl_faktur )->format('d/m/Y') }}</strong></td>
                                <td><strong>{{ Carbon\Carbon::parse( $tgl_jatuh_tempo )->format('d/m/Y') }}</strong></td>
                                <td><strong>{{ $namaPelanggan }}</strong></td>
                            </tr>
                        </table>

                        <input hidden type="text" name="kode_transaksi" value="{{ $kode_transaksi }}">
                        <input hidden type="text" name="tgl_faktur" value="{{ $tgl_faktur }}">
                        <input hidden type="text" name="tgl_jatuh_tempo" value="{{ $tgl_jatuh_tempo }}">
                        <input hidden type="text" name="pelanggan_id" value="{{ $pelanggan_id }}">
                        <input hidden type="text" name="jenis_pembayaran" value="{{ $jenis_pembayaran }}">

                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="barang_id"> Nama Barang</label>
                                    <div class="input-group">
                                        <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" id="barang_id">
                                            <option value="">--Pilih Barang--</option>
                                            @foreach ($getBarang as $item)
                                                <option value="{{ $item->id }}" {{ old('barang_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_barang }} |  {{ $item->getSuplier->nama_suplier }} | {{ 'Rp ' . number_format($item->harga, 0, ',', '.') }} | {{ 'Stok :'. $item->stok . 'Pcs'}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('barang_id')
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
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="jumlah_beli">Jumlah</label>
                                    <div class="input-group">
                                        <input type="number" value="{{ old('jumlah_beli') }}" name="jumlah_beli" id="jumlah_beli" class="form-control @error('jumlah_beli') is-invalid @enderror" placeholder="Masukkan Jumlah...."/>
                                        @error('jumlah_beli')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <span class="input-group-text bg-primary text-white">Pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="harga_jual">Harga Jual</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white">Rp</span>
                                        <input type="number" value="{{ old('harga_jual') }}" name="harga_jual" id="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" placeholder="Masukkan Jumlah...."/>
                                        @error('harga_jual')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="diskon">Diskon</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white">%</span>
                                        <input type="number" value="{{ old('diskon') }}" name="diskon" id="diskon" class="form-control @error('diskon') is-invalid @enderror" placeholder="Masukkan Isi jika ada diskon"/>
                                        @error('diskon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <p>Sub Total:</p>
                                </div>
                                <div class="row">
                                    <strong id="subtotal">Rp. 0</strong>
                                </div>
                            </div>
                        </div>

                        <input hidden type="text" name="cabang" value="Palembang">

                        <div class="container-fluid text-end">
                            <a href="{{ url('/barang-keluar/add') }}" class="btn btn-secondary btn-sm">Cancel <i class="bi bi-x"></i></a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan <i class="bi bi-plus"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahBeliInput = document.getElementById('jumlah_beli');
        const hargaJualInput = document.getElementById('harga_jual');
        const diskonInput = document.getElementById('diskon');
        const subtotalDisplay = document.getElementById('subtotal');

        function calculateSubtotal() {
            const jumlahBeli = parseFloat(jumlahBeliInput.value) || 0;
            const hargaJual = parseFloat(hargaJualInput.value) || 0;
            const diskon = parseFloat(diskonInput.value) || 0;

            let subtotal = jumlahBeli * hargaJual;
            if (diskon > 0) {
                subtotal = subtotal - (subtotal * (diskon / 100));
            }

            subtotalDisplay.textContent = `Rp. ${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }

        jumlahBeliInput.addEventListener('input', calculateSubtotal);
        hargaJualInput.addEventListener('input', calculateSubtotal);
        diskonInput.addEventListener('input', calculateSubtotal);
    });
</script>
@endsection
