@extends('layout/index')
@section('title', 'Dasboard - Cuti')
@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Cuti</a></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-6">
        @if(auth()->user()->role == 'admin')
        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus"></i> Tambah</button>
        @endif
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pengajuan Cuti Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Divisi</th>
                                <th>Jenis Cuti</th>
                                <th>Tgl Cuti</th>
                                <th>Alasan</th>
                                <th>Lama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cuties as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->employe->name }}</td>
                                <td>{{ $data->employe->division->name }}</td>
                                <td>{{ $data->jenis_cuti }}</td>
                                <td>{{ date('d M Y', strtotime($data->tgl)) }}</td>
                                <td>{{ $data->alasan }}</td>
                                <td>{{ $data->lama_cuti }}</td>
                                <td align="center">
                                    @if($data->setuju == '0')
                                        <button class="btn btn-danger btn-sm"><span class="fa fa-exclamation" style="color: #FFF;"></span></button>
                                    @else
                                        <button class="btn btn-success btn-sm"><span class="fa fa-check" style="color: #FFF;"></span></button>
                                    @endif
                                </td>
                                <td align="center">
                                    @if($data->setuju == '0' && auth()->user()->role == 'hrd')
                                    <a onclick="return confirm('Pengajuan cuti distujui?')" href="{{ route('cuti.approve', $data->id) }}" class="btn btn-primary btn-xs">Approve</a>
                                    @endif
                                    @if(auth()->user()->role == 'admin')
                                    <a onclick="return confirm('Data karyawan akan dihapus?')" href="{{ route('cuti.delete', $data->id) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                    <a href="{{ route('cuti.pdf', $data->id) }}" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Divisi</th>
                                <th>Jenis Cuti</th>
                                <th>Tgl Cuti</th>
                                <th>Alasan</th>
                                <th>Lama</th>
                                <th>Status</th>
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
                <h5 class="modal-title">Tambah Data Cuti</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('cuti.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="out">Karyawan</label>
                        <select name="employe_id" required class="form-control">
                            <option value="">Pilih Karyawan</option>
                            @foreach($employes as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="out">Jenis Cuti</label>
                        <select name="jenis_cuti" class="form-control" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <option value="Cuti Tahunan">Cuti Tahunan</option>
                            <option value="Cuti Sakit">Cuti Sakit</option>
                            <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="out">Tanggal Cuti</label>
                        <input type="date" name="tgl" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="out">Lama Cuti (Hari)</label>
                        <select name="lama_cuti" class="form-control" required="required">
                            <option value="">Pilih Lama Cuti</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="out">Alasan Cuti</label>
                        <textarea name="alasan" class="form-control" required="required" rows="7" placeholder="Alasan Cuti"></textarea>
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