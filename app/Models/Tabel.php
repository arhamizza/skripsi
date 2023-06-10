<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabel extends Model
{
    use HasFactory;
    protected $table = 'tabel';
    protected $fillable =[
        'id_linguistik',
        'A',
        'B',
        'C',
        'D',
    ];

    public function asd()
    {
        return $this->belongsTo(Datatable::class,'id_linguistik','id');
    }
}
