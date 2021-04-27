<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Daftar Motor";
        if ($request->has('keyword')) {
            $motor = Motor::where('plat_nomor', 'LIKE', '%' . $request->keyword . '%')->get();
        } else {
            $motor = Motor::all();
        }

        return view('admin.motor', compact('title', 'motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Motor Barang";
        // $motor = Motor::all();
        return view('admin.inputmotor', compact('title',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'kolom harus diisi',
            'date' => 'harus berupa tanggal',
            'numeric' => 'input harus berupa angka'

        ];
        $validasi = $request->validate([
            'plat_nomor' => 'required|max:10',
            'nama_motor' => 'required',
            'merk' => 'required',
            'warna' => 'required',
            'tahun_kendaraan' => 'required',
            'no_mesin' => 'required',
            'no_rangka' => 'required',
            'harga_beli' => 'numeric',
            'biaya_perbaikan' => 'numeric',
            'modal' => 'numeric',
            'cover' => 'mimes:jpg, png, bmp|max:2048'

        ], $message);
        $validasi['user_id'] = Auth::id();
        $path = $request->file('cover')->store('covers');
        $validasi['cover'] = $path;
        Motor::create($validasi);
        return redirect('penjual/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = Motor::find($id);
        $title = "Detail Barang";
        return view('admin.detailmotor', compact('title', 'motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Motor::find($id);
        $title = "Edit Data Motor";
        return view('admin.inputmotor', compact('title', 'motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'kolom harus diisi',
            'date' => 'harus berupa tanggal',
            'numeric' => 'input harus berupa angka'

        ];
        $validasi = $request->validate([
            'plat_nomor' => 'required|max:10',
            'nama_motor' => 'required',
            'merk' => 'required',
            'warna' => 'required',
            'tahun_kendaraan' => 'required',
            'no_mesin' => 'required',
            'no_rangka' => 'required',
            'harga_beli' => 'numeric',
            'biaya_perbaikan' => 'numeric',
            'modal' => 'numeric'

        ], $message);
        if ($request->hasFile('cover')) {
            // $fileName = time() . $request->file('cover')->getClientOriginalName();
            // $path = $request->file('cover')->store('covers', $fileName);
            $path = $request->file('cover')->store('covers');
            $validasi['cover'] = $path;
            $motor = Motor::find($id);
            Storage::delete($motor->cover);
        }
        $validasi['user_id'] = Auth::id();
        Motor::where('id', $id)->update($validasi);
        return redirect('motor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Motor::find($id);
        if ($motor != null) {
            Storage::delete($motor->cover);
            $motor = Motor::find($motor->id);
            Motor::where('id', $id)->delete();
        }
        return redirect('motor');
    }
}