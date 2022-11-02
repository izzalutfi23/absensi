@extends('layout/index')
@section('title', 'Dasboard - Karyawan')
@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Karyawan</a></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-6">
        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus"></i> Tambah</button>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employes as $employe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employe->name }}</td>
                                <td>{{ $employe->division->name }}</td>
                                <td>{{ date('d M Y', strtotime($employe->birth)) }}</td>
                                <td>{{ ($employe->gender == 'L' ? 'Laki-laki' : 'Perempuan') }}</td>
                                <td>{{ $employe->address }}</td>
                                <td align="center">
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal{{ $employe->id }}"><span class="fa fa-edit"></span></button>
                                    <a onclick="return confirm('Data karyawan akan dihapus?')" href="{{ route('employe.delete', $employe->id) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                            
                            <!-- Edit -->
                            <div class="modal fade" id="editModal{{ $employe->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('employe.update', $employe->id) }}" method="POST">
                                            @method('patch')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="out">Nama Karyawan</label>
                                                    <input type="text" name="name" value="{{ $employe->name }}" required="required" class="form-control" placeholder="Masukkan nama karyawan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="out">Pilih Divisi</label>
                                                    <select name="division_id" required class="form-control">
                                                        <option value="">Pilih Divisi</option>
                                                        @foreach($divisions as $div)
                                                        <option value="{{ $div->id }}" {{ $employe->division_id == $div->id ? 'selected' : '' }}>{{ $div->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="out">Tanggal Lahir</label>
                                                    <input type="date" name="birth" value="{{ $employe->birth }}" required="required" class="form-control" placeholder="Masukkan tanggal lahir">
                                                </div>
                                                <div class="form-group">
                                                    <label for="out">Jenis Kelamin</label>
                                                    <select name="gender" class="form-control" required="required">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="L" {{ $employe->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="P" {{ $employe->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="out">Alamat</label>
                                                    <textarea name="address" class="form-control" required="required" rows="7" placeholder="Masukkan alamat">{{ $employe->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('employe.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="out">Nama Karyawan</label>
                        <input type="text" name="name" required="required" class="form-control" placeholder="Masukkan nama karyawan">
                    </div>
                    <div class="form-group">
                        <label for="out">Pilih Divisi</label>
                        <select name="division_id" required class="form-control">
                            <option value="">Pilih Karyawan</option>
                            @foreach($divisions as $div)
                            <option value="{{ $div->id }}">{{ $div->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="out">Tanggal Lahir</label>
                        <input type="date" name="birth" required="required" class="form-control" placeholder="Masukkan tanggal lahir">
                    </div>
                    <div class="form-group">
                        <label for="out">Jenis Kelamin</label>
                        <select name="gender" class="form-control" required="required">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="out">Alamat</label>
                        <textarea name="address" class="form-control" required="required" rows="7" placeholder="Masukkan alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection