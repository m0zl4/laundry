<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Transaksi;
use Illuminate\Http\Request;
use Validator;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index(Request $request)
    {
        $checkout = Checkout::paginate(5);
        $transaksi = Transaksi::all();
        return view('checkout.index', compact('checkout','transaksi'));
    }

    public function create()
    {
        $transaksi = Transaksi::all();
        return view('checkout.create', compact('transaksi'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_transaksi' => 'required',
            'jumlah_paket' => 'required|max:3',
            'tanggal_bayar' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('checkout.create')->withErrors($validator)->withInput();
        }
        $transaksi = Transaksi::find($request->id_transaksi);
        $input['subtotal'] = $input['jumlah_paket'] * $transaksi->paket->harga;
        
        Checkout::create($input);

        
        $transaksi->status_pembayaran = 'lunas';
        $transaksi->status_pesanan = 'selesai';
        $transaksi->save();

        return redirect()->route('checkout.index')->with('success','Berhasil');
    }

    public function show($id)
    {
        $checkout = Checkout::findOrFail($id);
        $transaksi = Transaksi::all();
        return view('checkout.show', compact('checkout','transaksi'));
    }


    public function edit(Checkout $checkout)
    {
        //
    }

    public function update(Request $request, Checkout $checkout)
    {
        //
    }


    public function destroy(Checkout $checkout)
    {
        //
    }

    public function print($id)
    {
        $checkout = Checkout::findOrFail($id);
        $transaksi = Transaksi::all();
        return view('checkout.invoice', compact('checkout','transaksi'));
    }
}
