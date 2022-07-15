<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriKegiatan;

class KegiatanRTController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('RT.kegiatan.tabel_kegiatan', [
            'kegiatan' => $kegiatan,
        ]);
    }

    public function create()
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('RT.kegiatan.tambah_kegiatan', [
            'kategori_kegiatan' => $kategori_kegiatan,
        ]);
    }
    // method yang berfungsi untuk memproses data inputan
    public function store(Request $request)
    {
        // untuk melakukan validasi terhadap inputan
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required',
            'kategori_kegiatan' => 'required',
            'isi_kegiatan' => 'required',
            'foto_kegiatan' => 'image|file|max:4095',
            'tgl_mulai_kegiatan' => 'required',
            'tgl_selesai_kegiatan' => 'required'
        ]);
        //untuk mengecek apakah ada inputan gambar, jika ada gambar akan disimpan
        if ($request->file('foto_kegiatan')) {
            $validatedData['foto_kegiatan'] = $request->file('foto_kegiatan')->store('gambar-kegiatan');
        }
        $validatedData['status_kegiatan'] = 1;
        $validatedData['penanggung_jawab'] = 'RT';
        $validatedData['id_penanggung_jawab'] = auth()->id();

        // try {
        //Memasukan data inputan kedalam tabel kegiatan pada database
        $insertData = Kegiatan::create($validatedData);
        //mengembalikan ke halaman rt.kegiatan.index
        if ($insertData) {
            return redirect()->route('rt.kegiatan.index')
                ->with('success', 'Data berhasil ditambah!');
            // return "data masuk";
        }
        // return "data gagal";
        return redirect()->route('rt.kegiatan.index')
            ->with('error', 'Gagal menambahkan data!');

        //     } catch (\Exception $e) {
        // //mengembalikan ke halaman rt.kegiatan.index dengan mengirimkan pesan
        // return redirect()->route('rt.kegiatan.index')
        //     ->with('error', 'Gagal menambahkan data!' . $e);
        //     }
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('RT.kegiatan.edit_kegiatan', [
            'kegiatan' => $kegiatan,
            'kategori_kegiatan' => KategoriKegiatan::all(),
        ]);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required',
            'kategori_kegiatan' => 'required',
            'isi_kegiatan' => 'required',
            'foto_kegiatan' => 'image|file|max:4095',
            'tgl_mulai_kegiatan' => 'required',
            'tgl_selesai_kegiatan' => 'required'
        ]);

        if ($request->file('foto_kegiatan')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_kegiatan'] = $request->file('foto_kegiatan')->store('gambar-kegiatan');
        }

        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)
            ->update($validatedData);
        return redirect()->route('rt.kegiatan.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(kegiatan $kegiatan)
    {
        // $kegiatan->delete();
        // if ($kegiatan->foto_kegiatan) {
        //     Storage::delete($kegiatan->foto_kegiatan);
        // }
        // return redirect()->route('rt.kegiatan.index');

        try {
            $kegiatan->delete();
            if ($kegiatan->foto_kegiatan) {
                Storage::delete($kegiatan->foto_kegiatan);
            }
            return redirect()->route('rt.kegiatan.index')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('rt.kegiatan.index')
                ->with('error', 'Gagal menghapus data');
        }
    }
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan['tanggal_publish'] = $this->tanggal_publish($kegiatan->created_at);
        // var_dump($this->tanggal_publish($kegiatan->created_at));
        // var_dump($kegiatan['tanggal_publish']);
        // dd($kegiatan['tanggal_publish']);
        // dd($kegiatan['tanggal_publish'] == false ? $kegiatan->created_at->diffForHumans() : tanggal_indo($kegiatan->created_at) );
        return view('RT.kegiatan.detail_kegiatan', [
            'kegiatan' => $kegiatan,
        ]);
    }

    public function tanggal_publish($tanggal)
    {
        if (is_null($tanggal)) {
            return null;
        };
        // return $tanggal->diffInDays(now()) > 7 ? $tanggal : $tanggal->diffForHumans();
        return $tanggal->diffInDays(now()) > 7 ? tanggal_indo($tanggal) : $tanggal->diffForHumans();
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->status_kegiatan;
        $status = $request->status_kegiatan == 0 ? 1 : 0;
        $product = Kegiatan::find($request->id_kegiatan);
        $product->status_kegiatan = $pre_status;
        $product->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'product' => $product]);
    }
}
