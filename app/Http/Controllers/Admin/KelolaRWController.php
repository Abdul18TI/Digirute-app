<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rw;
use App\Models\Rt;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KelolaRWController extends Controller
{

    public function index()
    {
        // $kelola_rw = rw::all();
        $kelola_rw = rw::with('identitas_rw')->get();
        // dd($kelola_rw);
        return view('Admin.Kelola_rtrw.rw.tabel_rw', [
            'kelola_rw' => $kelola_rw,
            "title" => "Kelola RW"
        ]);
    }

    public function create()
    {
        $rw = Warga::all();
        return view('Admin.Kelola_rtrw.rw.tambah_rw', [
            'title' => 'tambah RW',
            'rw' => $rw
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_warga' => 'required',
            'username' => 'required|unique:rws',
            'password' => 'required',
            'no_rw' => 'required',
            'tgl_awal_jabatan_rw' => 'required',
            'tgl_akhir_jabatan_rw' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['status_rw'] = 0;
        $validatedData['ketua_rw'] = "tes";

        try {
            rw::create($validatedData);

            return redirect()->route('rw.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rw.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(rw $rw)
    {
        $kelola_rw = Warga::all();
        return view('Admin.Kelola_rtrw.rw.edit_rw', [
            'rw' => $rw,
            'kelola_rw' => $kelola_rw,
            'title' => 'edit-rw'
        ]);
    }

    public function update(Request $request, rw $rw)
    {
        $validatedData = $request->validate([
            'id_warga' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_rw' => 'required',
            'tgl_awal_jabatan_rw' => 'required',
            'tgl_akhir_jabatan_rw' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);

        rw::where('id_rw', $rw->id_rw)
            ->update($validatedData);
        return redirect()->route('rw.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(rw $rw)
    {
        try {
            $rw->delete();
            return redirect()->route('rw.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rw.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }

    public function show($id)
    {
        $kelola_rw = rw::where('id_rw', $id)->get();
        $identitas_rw = rw::with('identitas_rw')->where('id_rw', $id)->get();
        $identitas_rt = rt::with('identitas_rt')->where('id_rw', $id)->get();
        // dd($kelola_rw);
        return view('Admin.Kelola_rtrw.rw.detail_rw', [
            'kelola_rw' => $kelola_rw,
            'identitas_rw' => $identitas_rw,
            'identitas_rt' => $identitas_rt,
            'title' => 'detail-rtrw'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->status_rw;

        // var_dump($pre_status);
        // echo "<br>/";
        $status = $request->status_rw == 0 ? 1 : 0;
        $product = Rw::find($request->id_rw);
        $product->status_rw = $pre_status;
        // var_dump($status);
        // echo "<br>/";
        // dd($product);
        $product->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'product' => $product]);
        // return redirect()->route('rt.kegiatan.index')
        //     ->with('error', 'Gagal menghapus data!');
    }
}
