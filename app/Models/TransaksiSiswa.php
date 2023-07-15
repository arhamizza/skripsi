<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSiswa extends Model
{
    protected $table = 'transaksi_siswa';
    use HasFactory;

    protected $fillable =[
        'id_transaksi',
        'id_siswa',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi','id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa','id');
    }
}
