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
                                </td>
                            </tr>
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