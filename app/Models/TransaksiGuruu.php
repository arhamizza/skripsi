<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiGuruu extends Model
{
    protected $table = 'transaksi_guru';
    use HasFactory;

    protected $fillable =[
        'id_transaksi',
        'id_guru',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi','id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
}
