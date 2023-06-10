<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datatable extends Model
{
    protected $fillable = [
        'nama',
        'visualisasi',
    ];
    use HasFactory;
}
