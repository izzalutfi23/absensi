<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Fifo</title>
    <style>
        body {
            margin: -40px;
            /* ashiaap EZ*/
            font-family: Arial, Helvetica, sans-serif;
        }

        .f14 {
            font-size: 14px;
        }

        .f12 {
            font-size: 12px;
        }

        .f10 {
            font-size: 10px;
        }

    </style>
</head>

<body style="padding: 0 10px 0 10px;">
    <!-- HALAMAN 1 GAN -->
    <div style="">
        <table style="width: 100%;">
            <tr>
                <td style="width: 20%;text-align: left;">
                    <img src="https://i.pinimg.com/originals/05/90/0b/05900b6d92a3380c522c3606c42de3f2.png" width="100px" alt="">
                </td>
                <td style="width: 60%;text-align: center; padding-left: 10px;">
                    <div style="margin-bottom: 3px;"><b style="font-size: 20px;">PT TELKOM INDONESIA</b><br></div>
                    <span style="font-size: 10px;">
                    Kawasan Industri Tugu Wijaya Kusuma, Jl. Tugu Industri I No.1, Randu Garut, Kec. Tugu, Kota Semarang, Jawa Tengah 50152</span>
                </td>
                <td style="width: 20%;text-align: center;font-size: 11px;vertical-align: text-top;">
                    <b>AM-05-02f/R0</b></td>
            </tr>
        </table>
    </div>
    <div style="padding: 0px 5px 0 5px;">
        <hr>
    </div>
    <div style="text-align: center;">
        <span style="font-size: 13px; text-transform: uppercase;">
            <b>LAPORAN KEHADIRAN KARYAWAN</b><br>
        </span>
    </div>
    <br>
    <div style="padding: 0px 5px 0 5px;">
        <table style="font-size: 14px;">
            <tr style="margin-bottom: 4px;">
                <td style="white-space: pre;">Nama</td>
                <td>: </td>
                <td>{{ $employe->name }}</td>
            </tr>
            <tr style="margin-bottom: 4px;">
                <td style="white-space: pre;">Divisi</td>
                <td>: </td>
                <td>{{ $employe->division->name }}</td>
            </tr>
            <tr style="margin-bottom: 4px;">
                <td style="vertical-align: top;">Bulan</td>
                <td style="vertical-align: top;">: </td>
                <td style="vertical-align: top;">{{ $month[$month1-1].' '.$year }}</td>
            </tr>
        </table>
        <br>
        <table border="1px" style="font-size: 10px;border: 1px solid black; width: 100%;border-collapse: collapse;text-align: center;" class="f12">
            <tr>
                <th style="border: 1px solid #000; padding: 4px;">#</th>
                <th style="border: 1px solid #000; padding: 4px;">Tanggal</th>
                <th style="border: 1px solid #000; padding: 4px;">Jam Masuk</th>
                <th style="border: 1px solid #000; padding: 4px;">Jam Keluar</th>
            </tr>
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
                            <td style="border: 1px solid #000; padding: 4px;">{{ $no }}</td>
                            <td style="border: 1px solid #000; padding: 4px;">{{ date('d M Y', strtotime($date)) }}</td>
                            <td style="border: 1px solid #000; padding: 4px;">{{ $row->in }}</td>
                            <td style="border: 1px solid #000; padding: 4px;">{{ $row->out == null ? 'Tidak Hadir' : $row->out }}</td>
                        </tr>
                    @else
                        <tr style="background-color: rgb(0,255,0)">
                            <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ $no }}</td>
                            <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ date('d M Y', strtotime($date)) }}</td>
                            <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ $row->desc }}</td>
                            <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ $row->desc }}</td>
                        </tr>
                    @endif
                    @php
                        $no+=1;
                        $status = true;
                    @endphp
                @endif
                @endforeach
                @if($status == false)
                    <tr style="background-color: rgba(255, 99, 71, 0.5);">
                        <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ $no }}</td>
                        <td style="border: 1px solid #000; padding: 4px; color: #FFF;">{{ date('d M Y', strtotime($date)) }}</td>
                        <td style="border: 1px solid #000; padding: 4px; color: #FFF;">Tidak Hadir</td>
                        <td style="border: 1px solid #000; padding: 4px; color: #FFF;">Tidak Hadir</td>
                    </tr>
                    @php
                        $no+=1;
                    @endphp
                @endif
            @endforeach
        </table>
        <br>
        <br>
        <table style="margin-top: 15px; width: 100%;border-collapse: collapse;" class="f12">
            <tr>
                <td style="width: 60%;">
                </td>
                <td style="width: 40%; text-align: center;">
                    <br>
                    <span>Semarang, <?=date('d M Y')?></span><br>
                    <span>HRD</span>
                    <br><br><br><br>
                    <span><b>___________</b></span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
