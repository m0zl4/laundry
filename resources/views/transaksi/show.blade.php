@extends('layouts.template')

@section('title')
Paket
@endsection

@section('content')

<div class="invoice p-3 mb-3">

        <div class="col-12">
            @if($transaksi->status_pembayaran=='belum dibayar')
            <div class="col-md-12">
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  
                    <i class="fa fa-exclamation-triangle"></i>
                    <b>{{$transaksi->pelanggan->nama_pelanggan}}</b> belum melakukan pembayaran
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <a href="/transaksi"><i class="fa fa-arrow-left"></i></a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nama pelanggan</th>
                            <td>{{$transaksi->pelanggan->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon Pelanggan</th>
                            <td>{{$transaksi->pelanggan->nomor_telepon}}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pelanggan</th>
                            <td>{{$transaksi->pelanggan->alamat_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Paket Laundry</th>
                            <td>{{$transaksi->paket->nama_paket}}</td>
                        </tr>
                        <tr>
                            <th>Harga per {{$transaksi->paket->satuan}}:</th>
                            <td>Rp. {{$transaksi->paket->harga}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$transaksi->status_pesanan}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{$transaksi->status_pembayaran}}</td>
                        </tr>

                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>


@endsection
