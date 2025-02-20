@extends('main')

@section('title')
    Data Pegawai
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 mb-3">Data Pegawai</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/pegawai')}}">Data Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Pegawai</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Data</div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4 form-outline">
                                            <input hidden type="text" id="pegawai-id" name="id">

                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <input type="text" value="{{ old('name', $getData->name) }}" name="name" id="pegawai-name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap..."/>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4 form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" value="{{ old('email', $getData->email) }}" name="email" id="pegawai-email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda"/>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4 form-outline">
                                            <label class="form-label" for="password">Password Baru??</label>
                                            <input type="text" value="{{ old('password') }}" name="password" id="pegawai-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda..."/>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="level" value="admin">
                                </div>

                            <button type="submit" class="btn btn-primary">Save Update</button>
                            <a href="{{ url('/pegawai') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
