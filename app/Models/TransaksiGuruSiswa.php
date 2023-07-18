<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiGuruSiswa extends Model
{
    use HasFactory;
    protected $table = 'transaksi_guru_siswa';
    use HasFactory;

    protected $fillable =[
        'id_transaksi',
        'id_guru',
    ];
    public function linguistik()
    {
        return $this->belongsTo(Tabel::class,'nilai','id');
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class,'id_kriteria','id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa','id');
    }
}
