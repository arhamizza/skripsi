<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_kelas',
        'id_siswa',
        'tanggal',
        'nama',
        'keterangan',
    ];

    public function guru2()
    {
        return $this->belongsToMany(Guru::class,'transaksi_gurus','id_transaksi','id_guru');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class,'transaksis','id_siswa','id');
    }
}
