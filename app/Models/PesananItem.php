<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananItem extends Model
{
    protected $table = 'pesanan_items';
    protected $fillable = ['pesanan_id', 'produk_id', 'qty', 'size'];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

     public function items()
    {
        return $this->hasMany(PesananItem::class);
    }

}
