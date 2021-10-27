@extends('layouts.template')

@section('title')
Transaksi Pesanan
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
                    <a href="transaksi/create"><i class="fa fa-plus"></i>Tambah Transaksi</a><hr>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Laundry</th>
                            <th>Status Pembayaran</th>
                            <th width="20%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($transaksi->perpage() * ($transaksi->currentPage() -1)) }}
                                </td>
                                <td>{{ $row->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $row->tanggal_masuk }}</td>
                                <td>
                                    @if($row->status_pembayaran=='belum_dibayar')
                                    <span class="badge bg-danger">Belum Dibayar</span>
                                    @else
                                    <span class="badge bg-success">Lunas</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <form method="post" action="{{route('transaksi.destroy', [$row->id])}}" onsubmit="return confirm('Hapus Pesanan {{$row->pelanggan->nama_pelanggan}}?')">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="{{route('transaksi.edit',[$row->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('transaksi.show',[$row->id])}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $transaksi->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>


@endsection