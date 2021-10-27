@extends('layouts.template')

@section('title')
Paket
@endsection

@section('content')

<div class="invoice p-3 mb-3">

        <div class="col-12">

            <div class="table-responsive">
                <a href="/transaksi"><i class="fa fa-arrow-left"></i></a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nama pelanggan</th>
                            <td>{{$checkout->transaksi->pelanggan->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon Pelanggan</th>
                            <td>{{$checkout->transaksi->pelanggan->nomor_telepon}}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pelanggan</th>
                            <td>{{$checkout->transaksi->pelanggan->alamat_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Paket Laundry</th>
                            <td>{{$checkout->transaksi->paket->nama_paket}}</td>
                        </tr>
                        <tr>
                            <th>Harga per {{$checkout->transaksi->paket->satuan}}:</th>
                            <td>Rp. {{$checkout->transaksi->paket->harga}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$checkout->transaksi->status_pesanan}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{$checkout->transaksi->status_pembayaran}}</td>
                        </tr>

                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
