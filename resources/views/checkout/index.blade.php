@extends('layouts.template')

@section('title')
Data Checkout
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(Request::get('pencarian'))
                    <div class="alert alert-secondary alert-block">
                        Hasil pencarian <b>{{ Request::get('pencarian') }}</b>
                    </div>
                @endif

                <div class="col-md-12">
                    <a href="checkout/create"><i class="fa fa-plus"></i> Checkout</a><hr>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Bayar</th>
                            <th>Subtotal</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkout as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($checkout->perpage() * ($checkout->currentPage() -1)) }}
                                </td>
                                <td>{{ $row->transaksi->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $row->transaksi->paket->nama_paket }}</td>
                                <td>{{ $row->transaksi->tanggal_masuk }}</td>
                                <td>{{ $row->tanggal_bayar }}</td>
                                <td>Rp. {{ $row->subtotal }}</td>
                                <td>
                                    <a href="{{ route('invoice',[$row->id]) }}"
                                        class="btn btn-primary"><i class="fa fa-print"></i></a>
                                    <a href="{{ route('checkout.show',[$row->id]) }}"
                                        class="btn btn-success"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $checkout->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>


@endsection
