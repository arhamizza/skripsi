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
        'id_nilai',
        'id_siswa',
        'id_Nilai_luingistik',
        'user_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru','id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi','id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa','id');
    }
    public function linguistik()
    {
        return $this->belongsTo(Tabel::class,'Nilai_linguistik','id');
    }
    
}
