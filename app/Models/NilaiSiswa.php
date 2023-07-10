<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'Nilai_linguistik',
        'id_transaksi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa','id');
    }
    public function linguistik()
    {
        return $this->belongsTo(Tabel::class,'Nilai_linguistik','id');
    }
    public function nilai()
    {
        return $this->belongsTo(Tabel::class,'id_transaksi','id');
    }
}
