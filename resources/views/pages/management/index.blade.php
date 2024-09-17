@extends('layouts.template_default')
@section('title', 'Halaman Management')
@section('management', 'active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halaman Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah </a>
        </div>
        @include('pages.management.create')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No_hp</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Npwp</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($managements as $management)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $management->nip }}</td>
                            <td>
                                <a href="#" class="text-decoration-none text-gray-600" data-toggle="modal" data-target="#modal-show{{ $management->id }}">
                                    {{ $management->nama }}
                                </a>
                            </td>
                            <td>{{ $management->email }}</td>
                            <td>{{ $management->no_hp }}</td>
                            <td>{{ $management->alamat }}</td>
                            <td>{{ $management->jenis_kelamin }}</td>
                            <td>{{ $management->npwp }}</td>
                            <td>{{ $management->tempat_lahir }}</td>
                            <td>{{ \Carbon\Carbon::parse($management->tanggal_lahir)->isoFormat('DD-MM-YYYY') }}</td>
                            <td>{{ $management->jabatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($management->tanggal_masuk)->isoFormat('DD-MM-YYYY') }}</td>
                            <td>
                                @if ($management->status == 'active')
                                <span class="badge bg-success text-white">{{ $management->status }}</span>
                                @else
                                <span class="badge bg-danger text-white">{{ $management->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-center">
                                    @if ($management->image)
                                    <img src="{{ Storage::url($management->image) }}" alt="gambar" width="120px" class="img-fluid">
                                    @else
                                    <img alt="image" class="img-fluid thumbnail" src="{{ asset('assets/img/user_default.png') }}" width="120px">
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="text-center d-flex">
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{ $management->id }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('management.destroy', $management->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('pages.management.edit')
                        @include('pages.management.show')
                        @empty
                        <tr>
                            <td colspan="15" class="text-center p-5">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('pages.management.edit')
@endsection