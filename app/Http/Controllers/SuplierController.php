<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = suplier::where('nama_suplier', 'LIKE', '%' . $search . '%')
        ->orWhere('telp', 'like', '%'.$search . '$')
        ->paginate();

        return view('suplier.suplier', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplier.addSuplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ], [
            'nama_suplier.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'alamat.required' => 'Data wajib diisi',

            'telp.required' => 'Data wajib diisi',
            'telp.numeric' => 'Data berupa angka',

            'tgl_terdaftar.required' => 'Data wajib diisi',
            'status.required' => 'Data wajib diisi',
        ]);
        $saveSuplier = new suplier();
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();


        return redirect('/suplier')->with(
            'message',
            'Data ' . $request->nama_suplier . ' Berhasil ditambahkan'
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
        $getData = suplier::find($id);
        // dd($getData);
        return view('suplier.editSuplier', compact(
            'getData'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ], [
            'nama_suplier.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'alamat.required' => 'Data wajib diisi',

            'telp.required' => 'Data wajib diisi',
            'telp.numeric' => 'Data berupa angka',

            'tgl_terdaftar.required' => 'Data wajib diisi',
            'status.required' => 'Data wajib diisi',
        ]);
        $saveSuplier = suplier::find($id);
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();

        return redirect('/suplier')->with(
            'message',
            'Data ' . $request->nama_suplier . ' Berhasil diperbarui!!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
