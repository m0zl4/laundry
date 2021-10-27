<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Paket;
use App\Checkout;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pelanggan = Pelanggan::count();
        $paket = Paket::count();
        $checkout = Checkout::sum('subtotal');
        
        return view('home', compact('pelanggan','paket','checkout'));
    }
}
