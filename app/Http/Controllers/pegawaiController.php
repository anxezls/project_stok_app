<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = User::where('name', 'LIKE', '%' . $search . '%')

        ->orWhere('level', 'like', "%{$search}%")
        ->paginate();
        
        $data = User::paginate();



        return view('pegawai.pegawai', compact(
            'data'
        ));
        return view('pegawai.pegawai');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required',
        ]);

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->level = $request->level;
        $save->save();


        return redirect()->back()->with(
            'message',
            'data pegawai berhasil ditambahkan'
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
        $getData = User::find($id);
        return view('pegawai.editPegawai', compact(
            'getData',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'password' => 'nullable|min:6',
            'level' => 'nullable',
        ]);

        $updateUser = User::find($id);
        $updateUser->name = $request->name;

        if ($request->filled('email') && $request -> email != $updateUser->email) {
            $request->validate([
                'email' => 'unique:users,email',
            ], [
                'email.unique' => 'Email sudah terdaftar',
            ]);

            $updateUser->email = $request->email;
        }

        if ($request->filled('password')) {
            $updateUser->password = Hash::make($request->password);
        }

        if ($request->filled('level')) {
            $updateUser->level = $request->level;
        }

        //untuk save
        $updateUser->save();

        return redirect('/pegawai')->with(
            'message',
            'Data Pegawai berhasil diperbaharui'
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getData = User::find($id);
        $getData->Delete();

        return redirect()->back()->with(
            'message',
            'Data Pegawai berhasil dihapus!!!'
        );
    }

}
