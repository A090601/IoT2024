@extends('layouts.template_default')
@section('title', 'Halaman kplmanagement')
@section('kplmanagement', 'active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halaman Kepala Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah </a>
        </div>
        @include('pages.kplmanagement.create')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Izin</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No_hp</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Npwp</th>
                            <th>Tempat_lahir</th>
                            <th>Tanggal_lahir</th>
                            <th>Spesialisasi</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>no_izin</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Npwp</th>
                                            <th>Tempat_lahir</th>
                                            <th>Tanggal_lahir</th>
                                            <th>no_izin</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                    <tbody>
                        @forelse ($kplmanagements as $kplmanagement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kplmanagement->no_izin }}</td>
                            <td>
                                <a href="#" class="text-decoration-none text-gray-600" data-toggle="modal" data-target="#modal-show{{ $kplmanagement->id }}">
                                    {{ $kplmanagement->nama }}
                                </a>
                            </td>
                            <td>{{ $kplmanagement->email }}</td>
                            <td>{{ $kplmanagement->no_hp }}</td>
                            <td>{{ $kplmanagement->alamat }}</td>
                            <td>{{ $kplmanagement->jenis_kelamin }}</td>
                            <td>{{ $kplmanagement->npwp }}</td>
                            <td>{{ $kplmanagement->tempat_lahir }}</td>
                            <td>{{ \Carbon\Carbon::parse($kplmanagement->tanggal_lahir)->isoFormat('DD-MM-YYYY') }}</td>
                            <td>{{ $kplmanagement->spesialisasi }}</td>
                            <td>{{ \Carbon\Carbon::parse($kplmanagement->tanggal_masuk)->isoFormat('DD-MM-YYYY') }}</td>
                            <td>
                                @if ($kplmanagement->status == 'active')
                                <span class="badge bg-success text-white">{{ $kplmanagement->status }}</span>
                                @else
                                <span class="badge bg-danger text-white">{{ $kplmanagement->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-center">
                                    @if ($kplmanagement->image)
                                    <img src="{{ Storage::url($kplmanagement->image) }}" alt="gambar" width="120px" class="img-fluid">
                                    @else
                                    <img alt="image" class="img-fluid tumbnail" src="{{ asset('assets/img/user_default.png') }}" width="120px" class="tumbnail img-fluid">
                                    @endif
                                </div>
                            </td>


                            <td>
                                <div class="text-center d-flex">
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{ $kplmanagement->id }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('kplmanagement.destroy', $kplmanagement->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('pages.kplmanagement.edit')
                        @include('pages.kplmanagement.show')
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
@include('pages.kplmanagement.edit')
@endsection