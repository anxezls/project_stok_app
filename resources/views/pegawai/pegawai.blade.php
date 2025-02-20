@extends('main')

@section('title')
    Data Pegawai
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="mt-2 mb-3">Data Pegawai</h3>
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col">
                <div class="mt-3 card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="pt-1 w-100">
                                <strong>Data Pegawai</strong>
                            </div>
                            <div class="w-100 text-end">
                                <a href="{{url('/pegawai')}}" class="btn btn-outline-primary btn-sm">
                                    Refresh Data <i class="bi bi-arrow-clockwise"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" id="flash-message">
                                {{Session::get('message')}}
                            </div>
                            <script>
                                setTimeout(function (){
                                    document.getElementById('flash-message').style.display='none';
                                }, {{ session('timeout', 5000) }});
                            </script>
                        @endif

                        <div class="mx-3 my-4 row">
                            <div class="col-6 bg-">
                                @if (Auth::user()->level == 'superadmin')
                                <a href="{{ url('/pegawai/add') }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPegawai">
                                    Pegawai Baru <i class="fa-solid fa-plus"></i>
                                </a>
                                @endif
                            </div>
                            <div class="col-6">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Cari Nama pegawai ...">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="70px"></th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            {{ (($data->currentPage() - 1) * $data->perPage()) + $loop->iteration }}
                                        </td>
                                        <td>{{ $item->name }} </td>
                                        <td>{{ $item->email }} </td>
                                        <td class="text-center">{{ $item->level }} </td>
                                        <td class="text-center">
                                            <a href="{{ url('/pegawai/edit') }}/{{ $item->id }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>

                                            <a href="{{ url('/pegawai/delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Hapus Data ???');">
                                                <i class="bi bi-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $data->links() }} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add New Data-->
    <div class="modal fade" id="addPegawai" tabindex="-1" aria-labelledby="addPegawai" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPegawai">Data Pegawai Baru</h1>
                    <a href="{{ url('/pegawai') }}" type="button" class="btn-close"></a>
                </div>
                <form action="{{ route('addPegawai')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4 form-outline">
                                    <label class="form-label" for="name">Nama Lengkap</label>
                                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap..."/>
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
                                    <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda"/>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4 form-outline">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="text" value="{{ old('password') }}" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda..."/>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="level" value="admin">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/pegawai') }}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- JavaScript Functions -->
    <script>
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('addPegawai'));
                myModal.show();
            });
        @endif

    </script>
@endsection
