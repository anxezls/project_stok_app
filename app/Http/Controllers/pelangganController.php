<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = pelanggan::where('nama_pelanggan', 'LIKE', '%' . $search . '%')
        ->orWhere('telp', 'LIKE', '%' . $search . '%')
        ->paginate();

        return view('pelanggan.pelanggan', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.addPelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'telp' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama_pelanggan.required' => 'Data wajib diisi',
            'telp.required' => 'Data wajib diisi',
            'telp.numeric' => 'Data wajib diisi',
            'jenis_kelamin.required' => 'Data wajib diisi',
            'alamat.required' => 'Data wajib diisi',
            'kota,required' => 'Data wajib diisi',
            'provinsi.required' => 'Data wajib diisi',
        ]);

        $savePelanggan = new pelanggan();
        $savePelanggan->nama_pelanggan = $request->nama_pelanggan;
        $savePelanggan->telp = $request->telp;
        $savePelanggan->jenis_kelamin = $request->jenis_kelamin;
        $savePelanggan->alamat = $request->alamat;
        $savePelanggan->kota = $request->kota;
        $savePelanggan->provinsi = $request->provinsi;
        $savePelanggan->save();


        return redirect('/pelanggan')->with(
            'message',
            'Data'  . $request->nama_pelanggan . 'Berhasil ditambahkan'
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
        $ikanHiu = pelanggan::find($id);
        return view('pelanggan.editPelanggan', compact(
            'ikanHiu'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama_pelanggan.required' => 'Data wajib diisi',
            'telp.required' => 'Data wajib diisi',
            'telp.numeric' => 'Data berupa angka',
            'jenis_kelamin.required' => 'Data wajib diisi',
            'alamat.required' => 'Data wajib diisi',

            'kota.required' => ' Data wajib diisi',
            'provinsi.required' => 'Data wajib diisi',


        ]);
        $savePelanggan = new pelanggan();
        $savePelanggan->nama_pelanggan = $request->nama_pelanggan;
        $savePelanggan->telp = $request->telp;
        $savePelanggan->jenis_kelamin = $request->jenis_kelamin;
        $savePelanggan->alamat = $request->alamat;
        $savePelanggan->kota = $request->kota;
        $savePelanggan->provinsi = $request->provinsi;
        $savePelanggan->save();


        return redirect('/pelanggan')->with(
            'message',
            'Data' . $request->nama_pelanggan . 'Berhasil diperbaharui!!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = pelanggan::find($id);
        $data->delete();

        return redirect()->back()->with(
            'message',
            'data pegawai berhasil dihapus!!!'
        );
    }
}
