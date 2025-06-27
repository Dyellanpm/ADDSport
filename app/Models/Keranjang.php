<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = [
        'produk_id',
        'user_id',
        'size',
        'qty',
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
}
