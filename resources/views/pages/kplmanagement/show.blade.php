@if(isset($kplmanagement))
<div class="modal fade" id="modal-show{{ $kplmanagement->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Biodata kplmanagement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        @if ($kplmanagement->image)
                        <img src="{{ Storage::url($kplmanagement->image) }}" alt="gambar" width="220px" style="width: 220px; height: 220px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                        @else
                        <img alt="image" class="img-fluid thumbnail" src="{{ asset('assets/img/user_default.png') }}" width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="no_izin"><strong>No Izin:</strong></label>
                                        <p id="no_izin">{{ $kplmanagement->no_izin }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nama"><strong>Nama:</strong></label>
                                        <p id="nama">{{ $kplmanagement->nama }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email"><strong>Email:</strong></label>
                                        <p id="email">{{ $kplmanagement->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="no_hp"><strong>Nomor Handphone:</strong></label>
                                        <p id="no_hp">{{ $kplmanagement->no_hp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="jenis_kelamin"><strong>Jenis Kelamin:</strong></label>
                                        <p id="jenis_kelamin">{{ $kplmanagement->jenis_kelamin }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="npwp"><strong>NPWP:</strong></label>
                                        <p id="npwp">{{ $kplmanagement->npwp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="alamat"><strong>Alamat:</strong></label>
                                        <p id="alamat">{{ $kplmanagement->alamat }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tempat_lahir"><strong>Tempat Lahir:</strong></label>
                                        <p id="tempat_lahir">{{ $kplmanagement->tempat_lahir }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_lahir"><strong>Tanggal Lahir:</strong></label>
                                        <p id="tanggal_lahir">{{ $kplmanagement->tanggal_lahir }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="spesialisasi"><strong>Spesialisasi:</strong></label>
                                        <p id="spesialisasi">{{ $kplmanagement->spesialisasi }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_masuk"><strong>Tanggal Masuk:</strong></label>
                                        <p id="tanggal_masuk">{{ $kplmanagement->tanggal_masuk }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="status"><strong>Status:</strong></label>
                                        <p>@if ($kplmanagement->status == 'active')
                                            <span class="badge bg-success text-white">{{$kplmanagement->status}}</span>
                                            @else
                                            <span class="badge bg-danger text-white">{{$kplmanagement->status}}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif