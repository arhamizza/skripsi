<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiGuru extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_guru',
        'id_transaksi',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi','id');
    }
    
}
