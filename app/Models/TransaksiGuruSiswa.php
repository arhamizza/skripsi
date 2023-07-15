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
}
