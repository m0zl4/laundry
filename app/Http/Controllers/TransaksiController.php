<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Paket;
use App\Pelanggan;
use Illuminate\Http\Request;
use Validator;

class TransaksiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $transaksi = Transaksi::paginate(5);
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        $pencarian = '';
        $cari_pelanggan = $request->get('id_pelanggan');
        if($cari_pelanggan)
        {
            $transaksi = Transaksi::where('id_pelanggan',$cari_pelanggan)->paginate(2);
            $hasil = Pelanggan::find($cari_pelanggan);
            $pencarian = $hasil->pelanggan;
        }
        return view('transaksi.index',compact('transaksi','paket','pelanggan','pencarian'));
    }

    public function create()
    {
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi.create', compact('paket','pelanggan'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_pelanggan' => 'required',
            'id_paket' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('transaksi.create')->withErrors($validator)->withInput();
        }
        Transaksi::create($input);
        return redirect()->route('transaksi.index')->with('success','Berhasil');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi.show', compact('transaksi','paket','pelanggan'));

    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi','paket','pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        $data = $request->all();
        $transaksi->update($data);
        return redirect()->route('transaksi.index', compact('transaksi','paket','pelanggan'));
        
    }

    public function destroy($id)
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();
        return redirect()->route('transaksi.index')->with('success','Berhasil');
    }
}
