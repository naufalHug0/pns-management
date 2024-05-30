<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNS Management | Print</title>
</head>
<body class="overflow-x-hidden">
<h1 style="text-align: center;">DAFTAR PEGAWAI{{ request()->get('unit-kerja') ? (request()->get('unit-kerja') == 'all' ? '' : ' | '.$pegawais[0]->jabatan->unit_kerja->nama) : '' }}</h1>
    <div style="width: 90%;margin:auto;">
    <table style="break-inside: avoid;border-collapse: collapse;" cellpadding="3" border="2">
    <thead style="background-color: rgb(23,37,84);color:white;">
        <tr style="border: 1px solid black;">
            <td>
                NIP
            </td>
            <td >
                NPWP
            </td>
            <td >
                Nama
            </td>
            <td >
                Tempat Tanggal Lahir
            </td>
            <td >
                Alamat
            </td>
            <td >
                Agama
            </td>
            <td >
                L/P
            </td>
            <td >
                Gol
            </td>
            <td >
                Eselon
            </td>
            <td >
                Jabatan
            </td>
            <td >
                Tempat Tugas
            </td>
            <td >
                Unit Kerja
            </td>
            <td >
                No HP
            </td>
        </tr>
    </tdead>
    <tbody>
        @foreach ($pegawais as $pegawai)
            <tr style="border: 1px solid black;">
                <td>
                    {{ $pegawai->nip }}
                </td>
                <td  >
                    {{ $pegawai->npwp }}
                </td>
                <td  >
                    {{ $pegawai->nama }}
                </td>
                <td  >
                    {{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}
                </td>
                <td  >
                    {{ $pegawai->alamat }}
                </td>
                <td  >
                    {{ $pegawai->agama->nama }}
                </td>
                <td  >
                    {{ $pegawai->jenis_kelamin }}
                </td>
                <td  >
                    {{ $pegawai->golongan->kode }}
                </td>
                <td  >
                    {{ $pegawai->jabatan->eselon->nama }}
                </td>
                <td  >
                    {{ $pegawai->jabatan->nama }}
                </td>
                <td  >
                    {{ $pegawai->jabatan->unit_kerja->tempat_tugas->nama }}
                </td>
                <td  >
                    {{ $pegawai->jabatan->unit_kerja->nama }}
                </td>
                <td  >
                    {{ $pegawai->no_hp }}
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>

@include('utils.print.script')
</body>
</html>