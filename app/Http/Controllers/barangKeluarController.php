<?php

namespace App\Http\Controllers;

use App\Models\barangKeluar;
use App\Models\BarangMasuk;
use App\Models\pelanggan;
use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangKeluarController extends Controller
{
   public function index(Request $request)
   {
    $query = BarangMasuk::with(
        'getStok',
        'getPelanggan',
        'getUser',
    );

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('tgl_buat', [
            $request->tanggal_awal,
            $request->tanggal_akhir,
        ]);
    }

    $query->orderBy('Created_at', 'desc');
    $getBarangKeluar = $query->paginate(10);
    $getTotalPendapatan = barangKeluar::sum('sub_total');
        return view('barang.BarangMasuk.BarangMasuk', compact(
            'getBarangKeluar',
            'getTotalPendapatan',
        ));
   }

   public function create()
   {
      $data = barangKeluar::all();

      $lastId = BarangKeluar::max('id');
      $lastId = $lastId ? $lastId : 0; //ternary operatur

      if ($data->isEmpty()) {
          $nextId = $lastId + 1;
          $date = now()->format('d/m/Y');
          $kode_transaksi = 'TRK' . $nextId . '/' . $date;

          $pelanggan = pelanggan::all();

          return view('barang.BarangKeluar.addBarangKeluar', compact(
            'data',
            'kode_transaksi',
            'pelanggan',
          ));
      }

      $lastestItem = barangKeluar::lastest()->first();
      $Id = $lastestItem->id;
      $date = $lastestItem->created_at->format('d/m/Y');
      $kode_transaksi = 'TRK' ($Id+1) . '/' . $date;
      $pelanggan = pelanggan::all();



    return view('barang.BarangKeluar.addBarangKeluar',compact(
        'data',
        'kode_transaksi',
        'pelanggan',
    ));
   }


   public function store(Request $request)
   {
    $request->validate([
        'tgl_faktur' => 'required',
        'tgl_jatuh_tempo' => 'required',
        'pelanggan_id' => 'required',
        'jenis_pembayaran' => 'required',
    ],[

        'tgl_faktur.required' => 'Data wajib diisi!',
        'tgl_jatuh_tempo.required' => 'Data wajib diisi!',
        'pelanggan_id.required' => 'Data wajib diisi!',
        'jenis_pembayaran.required' => 'Data wajib diisi1',
    ]);

    $kode_transaksi = $request->kode_transaksi;
    $tgl_faktur = $request->tgl_faktur;
    $tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
    $pelanggan_id = $request->pelanggan_id;

    $getNamaPelanggan =pelanggan::find($pelanggan_id);
    $namaPelanggan = $getNamaPelanggan->nama_pelanggan;
    $jenis_pembayaran = $request->jenis_pembayaran;

    $getBarang = stok::all();

    return view('Transaksi.transaksi', compact(
        'kode_transaksi',
        'tgl_faktur',
        'tgl_jatuh_tempo',
        'pelanggan_id',
        'namaPelanggan',
        'jenis_pembayaran',
        'getBarang',
    ));
    }
    public function saveBarangKeluar(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'tgl_faktur' => 'required',
            'tgl_jatuh_tempo' => 'required',
            'pelanggan_id' => 'required',
            'jenis_pembayaran' => 'required',
            'barang_id' => 'required',
            'jumlah_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $save = new barangKeluar();
        $save->kode_transaksi = $request->kode_transaksi;
        $save->tgl_faktr = $request->tgl_faktur;
        $save->tgl_jatuh_tempo = $request->tgl_jatuh_tempo;
        $save->pelanggan_id = $request->pelanggan_id;
        $save->jenis_pembayaran = $request->jenis_pembayaran;
        $save->barang_id = $request->barang_id;
        $save->jumlah_beli = $request->dsvsvsdfsdf;
        $save->harga_jual = $request->harga_jual;
        $save->diskon = $request->diskon;
        $save->sub_total = $request->sub_total;
        $save->user_id = $request->user_id;
        $save->tgl_buat = $request->tgl_buat;

         $getStokData = stok::find($request->barang_id);
             $getJumlahStok = $getStokData->stok;
         $getStokData->stok = $getJumlahStok - $request->jumlah_beli;
         $getStokData->save();

        $diskon = $request->diskon;
            $nilaiDiskon = $diskon/100;

        if ($diskon) {
            $save->diskon = $request->diskon;
            $hitung = $request->jumlah_beli * $request->harga_jual;
            $totalDiskon = $hitung * $nilaiDiskon;
            $subTotal = $hitung - $totalDiskon;
        $save->sub_total = $subTotal;
        }else{
            $hitung = $request->jumlah_beli * $request->harga_jual;
            $save->sub_total = $hitung;
        }
        $save->user_id = Auth::user()->id;
        $save->tgl_buat = $request->tgl_faktur;
        $save->save();

        return redirect('/barang-keluar')->with(
            'message',
            'Barang Keluar add',
        );


    }
    //kode_transaksi
    //tgl_faktur
    //tgl_jatuh_tempo
    //pelanggan_id
    //jenis_pembayaran
    //barang_id
    //jumlah_beli
    //harga_id
    //diskon
    //sub_total
    //user_id
    //tgl_buat
}
