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
    @if($attendance->in == null || $attendance->out == null && Request::segment(2) == 'detail' && $attendance->status == 'H')
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
                        <tr>
                            <td>Rekap</td>
                            <td>:</td>
                            <td>(H:{{ $count['h'] }} I:{{ $count['i'] }} S:{{ $count['s'] }} C:{{ $count['c'] }} T:{{ $count['total'] - ($count['h']+$count['i']+$count['s']+$count['c']) }})</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('attendance.filter', Request::segment(3)) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="form-row">
                            <div class="col-sm-4">
                                <select name="month" class="form-control" required="required">
                                    <option value="">Pilih Bulan</option>
                                    @foreach($month as $m)
                                        <option value="{{ $loop->iteration }}" {{ $month1 == $loop->iteration ? 'selected' : '' }}>{{ $m }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 mt-2 mt-sm-0">
                                <select name="year" class="form-control" required="required">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2022" {{ $year == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $year == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $year == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $year == '2025' ? 'selected' : '' }}>2025</option>
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
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach($attendances as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y', strtotime($row->date)) }}</td>
                                <td>{{ $row->in }}</td>
                                <td>{{ $row->out }}</td>
                            </tr>
                            @endforeach
                        </tbody> --}}
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($data as $date)
                                @php
                                    $status = false;
                                @endphp
                                @foreach($attendances as $row)
                                @if($row->date == $date)
                                    @if($row->status == 'H')
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ date('d M Y', strtotime($date)) }}</td>
                                            <td>{{ $row->in }}</td>
                                            <td>{{ $row->out == null ? 'Tidak Hadir' : $row->out }}</td>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')" href="{{ route('attendance.delete', $row->id) }}" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr style="background-color: rgb(0,255,0)">
                                            <td style="color: #FFF;">{{ $no }}</td>
                                            <td style="color: #FFF;">{{ date('d M Y', strtotime($date)) }}</td>
                                            <td style="color: #FFF;">{{ $row->desc }}</td>
                                            <td style="color: #FFF;">{{ $row->desc }}</td>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')" href="{{ route('attendance.delete', $row->id) }}" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicModal{{ $row->id }}">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{ $row->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Alasan Tidak Hadir</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="out">Keterangan</label>
                                                                <textarea name="address" class="form-control" required="required" rows="7">{{ $row->value }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @php
                                        $no+=1;
                                        $status = true;
                                    @endphp
                                @endif
                                @endforeach
                                @if($status == false)
                                    <tr style="background-color: rgba(255, 99, 71, 0.5);">
                                        <td style="color: #FFF;">{{ $no }}</td>
                                        <td style="color: #FFF;">{{ date('d M Y', strtotime($date)) }}</td>
                                        <td style="color: #FFF;">Tidak Hadir</td>
                                        <td style="color: #FFF;">Tidak Hadir</td>
                                        <td></td>
                                    </tr>
                                    @php
                                        $no+=1;
                                    @endphp
                                @endif
                            @endforeach
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