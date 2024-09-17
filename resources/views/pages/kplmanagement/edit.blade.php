@if (isset($kplmanagement))
<div class="modal fade" id="modal-edit{{ $kplmanagement->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Update Kepala Management</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kplmanagement.update', $kplmanagement->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_izin">No Izin</label>
                                    <input type="text" class="form-control @error('no_izin') is-invalid @enderror" id="no_izin" name="no_izin" placeholder="No Izin" value="{{ old('no_izin') ?? $kplmanagement->no_izin }}" required />
                                    @error('no_izin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') ?? $kplmanagement->nama }}" required />
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') ?? $kplmanagement->email }}" required />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $kplmanagement->no_hp }}" required />
                                    @error('no_hp')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="{{ $kplmanagement->jenis_kelamin }}">{{ $kplmanagement->jenis_kelamin }}
                                        </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" placeholder="NPWP" value="{{ old('npwp') ?? $kplmanagement->npwp }}" required />
                                    @error('npwp')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" required>{{ old('alamat') ?? $kplmanagement->alamat }}</textarea>
                                    @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') ?? $kplmanagement->tempat_lahir }}" required />
                                    @error('tempat_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') ?? $kplmanagement->tanggal_lahir }}" required />
                                    @error('tanggal_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="spesialisasi">Spesialisasi</label>
                                    <select class="form-control" id="spesialisasi" name="spesialisasi">
                                        <option value="{{ $kplmanagement->spesialisasi }}">{{ $kplmanagement->spesialisasi }}
                                        </option>
                                        <option value="Poli Umum">Poli Umum</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk" value="{{ old('tanggal_masuk') ?? $kplmanagement->tanggal_masuk }}" required />
                                    @error('tanggal_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="{{ $kplmanagement->status }}">{{ $kplmanagement->status }}</option>
                                        <option value="active">active</option>
                                        <option value="non active">non active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="mb-3">
                                        @if ($kplmanagement->image)
                                        <img src="{{ Storage::url($kplmanagement->image) }}" alt="gambar" width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                        @else
                                        <img alt="image" class="img-fluid tumbnail" src="{{ asset('assets/img/user_default.png') }}" width="120px">
                                        @endif
                                    </div>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif