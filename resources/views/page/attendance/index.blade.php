@extends('layout/index')
@section('title', 'Dasboard - Karyawan')
@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Absensi</a></li>
            </ol>
        </div>
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
                                    <a href="{{ route('attendance.detail', $employe->id) }}" class="btn btn-primary btn-xs">Lihat Kehadiran</a>
                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#basicModal{{ $employe->id }}"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="basicModal{{ $employe->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cetak Absensi</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('attendance.pdf') }}" method="POST" target="_blank">
                                        @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="out">Bulan</label>
                                                    <input type="hidden" name="id" value="{{ $employe->id }}">
                                                    <select name="month" class="form-control" required="required">
                                                        <option value="">Pilih Bulan</option>
                                                        @foreach($month as $m)
                                                            <option value="{{ $loop->iteration }}">{{ $m }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="out">Tahun</label>
                                                    <select name="year" class="form-control" required="required">
                                                        <option value="">Pilih Tahun</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
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
@endsection