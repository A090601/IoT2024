@extends('layouts.template_default')
@section('title', 'Halaman Keloladevice')
@section('keloladevice', 'active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halaman Kelola Device</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah </a>
        </div>
        @include('pages.Keloladevice.create')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Antrian</th>
                            <th>No Rekam Medis</th>
                            <th>Nama</th>
                            <th>Status Pasien</th>
                            <th>Status Panggilan</th>
                            <th>Dokter</th>
                            <th>Poli</th>
                            <th>Panggilan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Keloladevices as $Keloladevice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $Keloladevice->created_at->format('d-M-Y') }}</td>
                            <td>0{{ $Keloladevice->no_antrian }}</td>
                            <td>{{ $Keloladevice->no_rekmed }}</td>
                            <td>{{ $Keloladevice->nama }}</td>
                            <td>{{ $Keloladevice->status_pasien }}</td>
                            <td>
                                @if ($Keloladevice->status_panggilan == 'sudah')
                                <span class="btn btn-xs btn-success">
                                    {{ $Keloladevice->status_panggilan }}</span>
                                @else
                                <span class="btn btn-xs btn-danger"> {{ $Keloladevice->status_panggilan }}</span>
                                @endif
                            </td>
                            <td>{{ $Keloladevice->dokter->nama ?? 'N/A' }}</td>
                            <td>{{ $Keloladevice->dokter->spesialisasi ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('Keloladevice.panggil', $Keloladevice->id) }}" method="post">
                                    @csrf

                                    <input name="status_panggilan" id="status_panggilan" type="hidden" value="sudah">
                                    <button class="btn btn-xs btn-primary" type="submit">Pengecekan</button>
                                </form>
                            </td>
                            <td>
                                <div class="text-center d-flex">
                                    <a href="#" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-edit{{ $Keloladevice->id }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('Keloladevice.destroy', $Keloladevice->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('pages.Keloladevice.edit', ['Keloladevice' => $Keloladevice])
                        @empty
                        <tr>
                            <td colspan="10" class="text-center p-5">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection