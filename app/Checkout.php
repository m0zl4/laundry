<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $guarded = [
        'id_transaksi', 'tanggal_bayar', 'jumlah_paket', 'subtotal'
    ];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi','id_transaksi');
    }
}
