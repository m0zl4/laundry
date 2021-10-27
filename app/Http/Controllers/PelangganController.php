<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use Validator;

class PelangganController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pelanggan = Pelanggan::paginate(5);
        $cari = $request->get('keyword');
        if($cari)
        {
            $pelanggan = Pelanggan::where('nama_pelanggan','LIKE',"%$cari%")->paginate(3);
        }
        return view('pelanggan.index',compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama_pelanggan' => 'required|max:100',
            'alamat_pelanggan' => 'required',
            'nomor_telepon' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('pelanggan.index')->withErrors($validator)->withInput();
        }
        Pelanggan::create($data);
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }

    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $data = $request->all();
        $pelanggan->update($data);
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }

    public function destroy($id)
    {
        $data=Pelanggan::findOrFail($id);
        $data->delete();
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }
}
