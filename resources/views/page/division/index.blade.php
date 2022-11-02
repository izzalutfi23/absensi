@extends('layout/index')
@section('title', 'Dasboard - Jam Kerja')
@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Divisi</a></li>
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
                <h4 class="card-title">Divisi Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divisions as $div)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $div->name }}</td>
                                    <td align="center">
                                        <a onclick="return confirm('Data akan dihapus!')" href="{{ route('division.delete', $div->id) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Divisi</th>
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
                <h5 class="modal-title">Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('division.store') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="out">Nama Divisi</label>
                        <input type="text" name="name" required="required" class="form-control" placeholder="Masukkan nama divisi">
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