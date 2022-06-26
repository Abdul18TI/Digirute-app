<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KelolaRTController extends Controller
{

    public function index()
    {
        // $kelola_rw = rw::all();
        $kelola_rt = rt::with('identitas_rt')->get();
        return view('Admin.Kelola_rtrw.rt.tabel_rt', [
            'kelola_rt' => $kelola_rt,
            "title" => "Kelola RT"
        ]);
    }

    public function create()
    {
        $rt = Warga::all();
        $rw = rw::all();
        return view('Admin.Kelola_rtrw.rt.tambah_rt', [
            'title' => 'tambah RT',
            'rt' => $rt,
            'rw' => $rw
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_warga' => 'required',
            'username' => 'required|unique:rts',
            'password' => 'required',
            'no_rt' => 'required',
            'id_rw' => 'required',
            'tgl_awal_jabatan_rt' => 'required',
            'tgl_akhir_jabatan_rt' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['status_rt'] = 0;
        $validatedData['ketua_rt'] = "tes";

        try {
            rt::create($validatedData);

            return redirect()->route('rt.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(rt $rt)
    {
        $kelola_rt = Warga::all();
        $rw = rw::all();
        return view('Admin.Kelola_rtrw.rt.edit_rt', [
            'rt' => $rt,
            'rw' => $rw,
            'kelola_rt' => $kelola_rt,
            'title' => 'edit-rt'
        ]);
    }

    public function update(Request $request, rt $rt)
    {
        $validatedData = $request->validate([
            'id_warga' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_rt' => 'required',
            'id_rw' => 'required',
            'tgl_awal_jabatan_rt' => 'required',
            'tgl_akhir_jabatan_rt' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        rt::where('id_rt', $rt->id_rt)
            ->update($validatedData);
        return redirect()->route('rt.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(rt $rt)
    {
        try {
            $rt->delete();
            return redirect()->route('rt.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }

    public function show($id)
    {
        $rt = rt::where('id_rt', $id)->first();
        // $kelola_rw = rw::where('id_rw', $id)->get();
        $identitas_rw = rw::with('identitas_rw')->where('id_rw', $rt->id_rw)->get();
        $identitas_rt = rt::with('identitas_rt')->where('id_rw', $rt->id_rw)->get();
        // dd($kelola_rw);
        return view('Admin.Kelola_rtrw.rt.detail_rt', [
            // 'kelola_rw' => $kelola_rw,
            'identitas_rw' => $identitas_rw,
            'identitas_rt' => $identitas_rt,
            'title' => 'detail-rtrw'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->status_rt;

        // var_dump($pre_status);
        // echo "<br>/";
        $status = $request->status_rt == 0 ? 1 : 0;
        $product = Rt::find($request->id_rt);
        $product->status_rt = $pre_status;
        // var_dump($status);
        // echo "<br>/";
        // dd($product);
        $product->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'product' => $product]);
        // return redirect()->route('rt.kegiatan.index')
        //     ->with('error', 'Gagal menghapus data!');
    }
}
