<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BarangMasuk::with(
            'getStok',
            'getSuplier',
            'getAdmin',
        );

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_faktur', [
                $request->tanggal_awal,
                $request->tanggal_akhir,
            ]);
        }

        $query->orderBy('created_at', 'desc');
        $getData = $query->paginate(10);
            return view('barang.BarangMasuk.BarangMasuk', compact(
                'getData'
            ));
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getnama_barang_id = stok::with('getSuplier')->get();
        // dd($getnama_barang_id);
        return view('barang.BarangMasuk.addBarangMasuk', compact(
            'getnama_barang_id'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_faktur' => 'required',
            'nama_barang_id' => 'required',
            'jumlah' => 'required',
        ]);


        $updateStok = stok::find($request->nama_barang_id);
        if ($request->filled('harga')) {
            $harga_beli = $request->harga;
        } else {
            $harga_beli = $updateStok->harga;
        }

        $saveBarangMasuk = new BarangMasuk();
        $saveBarangMasuk-> tanggal_faktur = $request->tanggal_faktur;
        $saveBarangMasuk-> nama_barang_id = $request->nama_barang_id;
        $saveBarangMasuk-> suplier_id = $updateStok->suplier_id;
        $saveBarangMasuk-> harga = $harga_beli;
        $saveBarangMasuk-> jumlah_barang_masuk = $request->jumlah;
        $saveBarangMasuk-> admin_id = Auth::user()->id;
        $saveBarangMasuk->save();

    $hitung = $updateStok->stok + $request->jumlah;
    $updateStok->stok = $hitung;
    $updateStok->save();

    return redirect('/barang-masuk')->with(
        'message',
        'Data barang ditambahkan'
    );

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
