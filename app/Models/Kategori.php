<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
