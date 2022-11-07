@extends('layout/index')
@section('title', 'Dasboard - Karyawan')
@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Absensi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
            </ol>
        </div>
    </div>
</div>

<!-- row -->
@if(!$attendance)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <button class="btn btn-warning btn-sm"><span class="fa fa-exclamation" style="color: #FFF;"></span></button>
                                </td>
                                <td>{{ date('d M Y') }}</td>
                                <td>
                                    <a onclick="return confirm('Absen masuk?')" href="{{ route('attendance.action', [$employe->id, 'in']) }}" class="btn btn-success btn-sm">Masuk</a>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><span class="fa fa-close" style="color: #FFF;"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    @if($attendance->in == null || $attendance->out == null)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Absen Harian</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><span class="fa fa-exclamation" style="color: #FFF;"></span></button>
                                    </td>
                                    <td>{{ date('d M Y') }}</td>
                                    <td>
                                        @if($attendance->in)
                                            <button class="btn btn-success btn-sm"><span class="fa fa-check" style="color: #FFF;"></span></button>
                                        @else
                                            <a onclick="return confirm('Absen masuk?')" href="{{ route('attendance.action', [$employe->id, 'in']) }}" class="btn btn-success btn-sm">Masuk</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($attendance->in)
                                            <a onclick="return confirm('Absen keluar?')" href="{{ route('attendance.action', [$employe->id, 'out']) }}" class="btn btn-success btn-sm">Keluar</a>
                                        @else
                                            <button class="btn btn-danger btn-sm"><span class="fa fa-close" style="color: #FFF;"></span></button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif

<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row m-3">
                <div class="col-lg-6">
                    <table width="100%" class="card-title" style="font-size: 17px;">
                        <tr>
                            <td width="15%">Nama</td>
                            <td>:</td>
                            <td>{{ $employe->name }}</td>
                        </tr>
                        <tr>
                            <td>Divisi</td>
                            <td>:</td>
                            <td>{{ $employe->division->name }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-4">
                                <select name="month" class="form-control" required="required">
                                    <option value="">Pilih Bulan</option>
                                    @foreach($month as $m)
                                        <option value="{{ $loop->iteration }}">{{ $m }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 mt-2 mt-sm-0">
                                <select name="year" class="form-control" required="required">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mt-2 mt-sm-0">
                                <button class="btn btn-primary pull-right">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-header">
                <h4 class="card-title" style="color: #808080;">Absen Bulan: November 2022</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection