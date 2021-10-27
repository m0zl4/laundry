<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use PDF;

class CetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $report = Checkout::orderBy('created_at','Desc')->paginate(20);
        return view('report.index', compact('report'));    
    }
    public function cetak_pdf()
    {
        $report = Checkout::orderBy('created_at','Desc')->get();
        $pdf = PDF::loadview('report.report_pdf', compact('report'));
        return $pdf->download('report-laundry.pdf');
    }

}
