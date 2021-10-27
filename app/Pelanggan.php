<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $guarded = [
        'nama_pelanggan', 'alamat_pelanggan', 'nomor_telepon'
    ]; //guarded hrs ke isi dan tidak ada nullable
}
