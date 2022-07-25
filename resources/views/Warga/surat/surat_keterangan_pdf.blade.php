<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
        }

        table tr td,
        table tr th {}

        .table td {
            padding: 0.25rem;
        }

        /* p, */
        label {
            /* font: 1rem 'Fira Sans', sans-serif; */
            /* font-size: 1rem; */
            font-size: 14px;
            /* margin-top:1px;  */
             margin: 0.1rem;
        }

        input {
            margin: 0.1rem;
        }

        .judul {
            width: 25% !important;
        }

        .titik {
            width: 1px !important;
        }
    </style>
</head>

<body>
    <div class="m-3">
        <center>
            <h5>
                <strong style="border-bottom: 3px solid black;padding-bottom: 5px;">
                    SURAT KETERANGAN
                </strong>
            </h5>
            <h6 class="mt-3">No. {{ $surat->nomor_surat }}</h6>
        </center>
        <p>Kami Ketua RT. {{ $surat->rt->no_rt }} RW. {{ $surat->rw->no_rw }},
            Kelurahanan Umban Sari, Kecamatan Rumbai, Kota Pekanbaru,
            Menerangkan bahwa : </p>
        <table class='table table-borderless ml-3'>
            <tr>
                <td class="judul">NIK</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->nik) }}</td>
            </tr>
            <tr>
                <td class="judul">Nama Lengkap</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->nama_lengkap) }}</td>
            </tr>
            <tr>
                <td class="judul">Jenis Kelamin</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan') }}</td>
            </tr>
            <tr>
                <td class="judul">Tempat Tanggal Lahir</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->tempat_lahir) }} / {{ tanggal_indo($surat->wargas->tgl_lahir) }}
                </td>
            </tr>
            <tr>
                <td class="judul">Agama</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->agamas->agama) }}</td>
            </tr>
            <tr>
                <td class="judul">Pekerjaan</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->pekerjaans->nama_pekerjaan) }}</td>
            </tr>
            <tr>
                <td class="judul">Alamat</td>
                <td class="titik">:</td>
                <td>{{ strtoupper($surat->wargas->alamat) }}</td>
            </tr>

        </table>

        <p>Adalah benar warga / penduduk yang bertempat tinggal diwilayah kawasan RT RW Kelurahan Umbansari Kecamatan
            Rumbai Kota Pekanbaru</p>
        <p>Adapun surat keterangan ini kami berikan kepadanya yang dipergunakan untuk : </p>
        @php
            $genap = '';
            $ganjil = '';
            $test = $surat->propertie_surat;
            $tanggal =  \Carbon\Carbon::parse($test->tanggal_approve_rt);
            // dd($test->tanggal_approve_rt);
        @endphp
        @foreach (setJenisSuratKeterangan() as $key => $value)
            @php
                $check = $key == in_array($key, $test->jenis_surat) ? 'checked' : '';
            @endphp
            @if ($loop->iteration <= round(count(setJenisSuratKeterangan()) / 2))
                @php
                $genap .=
                        // '<div class="mb-0">
                        '<div>
                        <input type="checkbox" id="'. $key.'" value="'. $key.'"' .$check .' disabled>
                          <label for="'. $key.'">' .str_replace(['<p>','</p>'], ' ',$value) .'</label>
                    </div>';
                @endphp
            @else
                @php
                $ganjil .=
                        '<div class="mb-0">
                        <input type="checkbox" id="'. $key.'" value="'. $key.'"' .$check .' disabled>
                          <label for="'. $key.'">' .str_replace(['<p>','</p>'], ' ',$value) .'</label>
                    </div>'; @endphp
                  @endif
                  @endforeach
                <table class='table table-borderless ml-3'>
                    <tr>
                        <td>
                            {!! $genap !!}
                        </td>
                        <td>
                            {!! $ganjil !!}

                        </td>
                    </tr>
        </table>
        <p>Demikian surat keterangan surat ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>
        <div style="width:50%; text-align: center; float: left;">
            <p class="m-0">&nbsp;</p>
            <p class="mb-1">Ketua RW. {{ $surat->rw->no_rw }}</p>
              <p><img class="mt-0" src="data:image/png;base64, {!! $surat->ttdrw  !!}"></p>
            <p>{{ $surat->rw->identitas_rw->nama_lengkap }}</p>
        </div>
        <div style="width:50%; text-align: center; float: right;">
            <p class="m-0">Pekanbaru, {{ $tanggal->isoFormat('D MMMM Y') }}</p>
            <p class="mb-1">Ketua RT. {{ $surat->rt->no_rt }} RW. {{ $surat->rw->no_rw }}</p>
            <p><img class="mt-0" src="data:image/png;base64, {!! $surat->ttdrt  !!}"></p>
            <p>{{ $surat->rt->identitas_rt->nama_lengkap }}</p>
        </div>
    </div>
</body>

</html>
