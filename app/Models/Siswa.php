<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable =[
        'id_kelas',
        'nama_siswa',
    ];

    public function nama_kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }
}
