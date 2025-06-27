<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['nama', 'no_hp', 'alamat', 'metode_pembayaran', 'status'];

    public function items()
    {
        return $this->hasMany(PesananItem::class);
    }
}
