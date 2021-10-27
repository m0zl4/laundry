<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $guarded = [
        'nama_paket','harga','satuan'
    ];//guarded hrs ke isi dan tidak ada nullable
}
