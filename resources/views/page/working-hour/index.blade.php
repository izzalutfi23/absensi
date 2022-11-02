@extends('layout/index')
@section('title', 'Dasboard - Jam Kerja')
@section('container')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Jam Kerja</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengaturan Jam Kerja</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>MASUK</th>
                                <th>KELUAR</th>
                                <th width="10%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $time->rule->in }}</td>
                                <td>{{ $time->rule->out }}</td>
                                <td align="center">
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#basicModal"><i class="fa fa-pencil"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
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
                <h5 class="modal-title">Edit Jam Kerja</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('working.hour.update', $time->id) }}" method="POST">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="in">Masuk</label>
                        <input type="time" name="in" required="required" value="{{ $time->rule->in }}" class="form-control" id="in" placeholder="Jam masuk">
                    </div>
                    <div class="form-group">
                        <label for="out">Keluar</label>
                        <input type="time" name="out" required="required" value="{{ $time->rule->out }}" class="form-control" id="out" placeholder="Jam keluar">
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