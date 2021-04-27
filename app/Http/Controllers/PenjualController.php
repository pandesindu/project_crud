<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Motor;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Data penjual";

        if ($request->has('keyword')) {
            $penjual = Penjual::where('nama_penjual', 'LIKE', '%' . $request->keyword . '%')->get();
        } else {
            $penjual = Penjual::all();
        }

        return view('admin.penjual', compact('title', 'penjual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "input data penjual";
        $motor = Motor::all();
        return view('admin.inputpenjual', compact('title', 'motor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $message = [
            'required' => 'kolom harus diisi',
            'date' => 'harus berupa tanggal',
            'numeric' => 'input harus berupa angka'

        ];
        $validasi = $request->validate([
            'nama_penjual' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'motor_id' => 'required'
        ], $message);
        Penjual::create($validasi);
        return redirect('penjual');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjual = Penjual::find($id);
        $title = "Edit Data Penjual";
        $motor = Motor::all();
        return view('admin.inputpenjual', compact('title', 'penjual', 'motor'));
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
            'nama_penjual' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'motor_id' => 'required'
        ], $message);

        Penjual::where('id', $id)->update($validasi);
        return redirect('penjual');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjual = Penjual::find($id);
        if ($penjual != null) {
            $penjual = Penjual::find($penjual->id);
            Penjual::where('id', $id)->delete();
        }
        return redirect('penjual');
    }
}