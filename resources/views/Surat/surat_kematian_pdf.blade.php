<!DOCTYPE html>
<html>

<head>
  <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
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
          SURAT KETERANGAN MENINGGAL DUNIA
        </strong>
      </h5>
      <h6 class="mt-3">{{$kematian->surats->nomor_surat}}</h6>
    </center>
    <p>Yang bertanda tangan di bawah ini Ketua RT. {{ $kematian->rt->no_rt }} RW. {{ $kematian->rw->no_rw }},
      Kelurahanan Umban Sari, Kecamatan Rumbai, Kota Pekanbaru,
      Menerangkan bahwa : </p>

    <table class='table table-borderless ml-3'>
      <tr>
        <td class="judul">NIK</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->nik) }}</td>
      </tr>
      <tr>
        <td class="judul">Nama Lengkap</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->nama_lengkap) }}</td>
      </tr>
      <tr>
        <td class="judul">Jenis Kelamin</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan') }}</td>
      </tr>
      <tr>
        <td class="judul">Tempat Tanggal Lahir</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->tempat_lahir) }} / {{ tanggal_indo($kematian->wargas->tgl_lahir) }}
        </td>
      </tr>
      <tr>
        <td class="judul">Agama</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->agamas->agama) }}</td>
      </tr>
      <tr>
        <td class="judul">Pekerjaan</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->pekerjaans->nama_pekerjaan) }}</td>
      </tr>
      <tr>
        <td class="judul">Alamat</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->wargas->alamat) }}</td>
      </tr>

    </table>

    <p>Telah meninggal dunia pada : </p>
    <table class='table table-borderless ml-3'>
      <tr>
        <td class="judul">Tanggal</td>
        <td class="titik">:</td>
        <td>{{ strtoupper(tanggal_indo($kematian->tgl_kematian)) }}</td>
      </tr>
      <tr>
        <td class="judul">Tempat Meninggal</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->tempat_kematian) }}</td>
      </tr>
      <tr>
        <td class="judul">Sebab Kematian</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->sebab_kematian) }}</td>
      </tr>
    </table>
    <p>Berdasarkan dari laporan saudara/saudari : </p>
    <table class='table table-borderless ml-3'>
      <tr>
        <td class="judul">NIK</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->nik_pelapor) }}</td>
      </tr>
      <tr>
        <td class="judul">Nama</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->nama_pelapor) }}</td>
      </tr>
      <tr>
        <td class="judul">Status Hubungan Terhadap Jenazah</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->hubungan_jenazah) }}</td>
      </tr>
      <tr>
        <td class="judul">Tempat Tanggal Lahir</td>
        <td class="titik">:</td>
        <td>{{ strtoupper($kematian->tempat_lahir_pelapor) }} /
          {{ strtoupper(tanggal_indo($kematian->tgl_lahir_pelapor)) }}</td>
      </tr>
    </table>
   
    <p>Demikian surat keterangan kematian ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>
<div style="width:50%; text-align: center; float: right;">
        <p class="m-0">Pekanbaru, {{ $kematian->created_at->isoFormat('D MMMM Y') }}</p>
        <p class="mb-1 pb-1">Ketua RT. {{ $kematian->rt->no_rt }} RW. {{ $kematian->rw->no_rw }}</p>
        <p><img class="mt-0" src="data:image/png;base64, {!! $kematian->qrcode !!}"></p>
        <p >{{ $kematian->rt->identitas_rt->nama_lengkap }}</p>
</div>
  </div>
</body>

</html>
