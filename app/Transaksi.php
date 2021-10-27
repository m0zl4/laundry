<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = [
        'id_paket','id_pelanggan','status_pesanan',
        'tanggal_masuk','status_pembayaran'
    ];

    public function paket()
    {
        return $this->belongsTo('App\Paket','id_paket');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

}
