<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan Cuti</title>
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
            <b>PENGAJUAN CUTI KARYAWAN</b><br>
        </span>
    </div>
    <br>
    <div style="padding: 0px 5px 0 5px;">
        <table style="font-size: 14px;">
            <tr style="margin-bottom: 4px;">
                <td style="white-space: pre;">Nama</td>
                <td>: </td>
                <td>{{ $cuti->employe->name }}</td>
            </tr>
            <tr style="margin-bottom: 4px;">
                <td style="white-space: pre;">Divisi</td>
                <td>: </td>
                <td>{{ $cuti->employe->division->name }}</td>
            </tr>
            <tr style="margin-bottom: 4px;">
                <td style="vertical-align: top;">Status</td>
                <td style="vertical-align: top;">: </td>
                <td style="vertical-align: top;">{{ $cuti->setuju == '0' ? 'Belum Disetujui' : 'Disetujui' }}</td>
            </tr>
        </table>
        <br>
        <div style="text-align: center;">
            <span style="font-size: 13px; text-transform: uppercase;">
                <b>Jenis Cuti yang Diambil</b><br>
            </span>
        </div>
        <br>
        <table border="1px" style="font-size: 10px;border: 1px solid black; width: 100%;border-collapse: collapse;text-align: center;" class="f12">
            <tr>
                <th style="border: 1px solid #000; padding: 4px;">#</th>
                <th style="border: 1px solid #000; padding: 4px;">Cuti Tahunan</th>
                <th style="border: 1px solid #000; padding: 4px;">Cuti Sakit</th>
                <th style="border: 1px solid #000; padding: 4px;">Cuti Karena Alasan Penting</th>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 4px;">1</td>
                <td style="border: 1px solid #000; padding: 4px;">{{ $cuti->jenis_cuti == "Cuti Tahunan" ? "Ya" : "Tidak" }}</td>
                <td style="border: 1px solid #000; padding: 4px;">{{ $cuti->jenis_cuti == "Cuti Sakit" ? "Ya" : "Tidak" }}</td>
                <td style="border: 1px solid #000; padding: 4px;">{{ $cuti->jenis_cuti == "Cuti Karena Alasan Penting" ? "Ya" : "Tidak" }}</td>
            </tr>
        </table>
        <br>
        <div style="text-align: center;">
            <span style="font-size: 13px; text-transform: uppercase;">
                <b>Alasan Cuti</b><br>
            </span>
        </div>
        <br>
        <table border="1px" style="font-size: 10px;border: 1px solid black; width: 100%;border-collapse: collapse;text-align: center;" class="f12">
            <tr>
                <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ $cuti->alasan }}</td>
            </tr>
        </table>
        <br>
        <div style="text-align: center;">
            <span style="font-size: 13px; text-transform: uppercase;">
                <b>Lamanya Cuti</b><br>
            </span>
        </div>
        <br>
        <table border="1px" style="font-size: 10px;border: 1px solid black; width: 100%;border-collapse: collapse;text-align: center;" class="f12">
            <tr>
                <th style="border: 1px solid #000; padding: 4px;">Tgl Cuti</th>
                <th style="border: 1px solid #000; padding: 4px;">Jumlah Hari</th>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ date('d M Y', strtotime($cuti->tgl)) }}</td>
                <td style="border: 1px solid #000; padding: 4px; text-align: center;">{{ $cuti->lama_cuti }}</td>
            </tr>
        </table>
        <br>
        <br>
        <table style="margin-top: 420px; width: 100%;border-collapse: collapse;" class="f12">
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
