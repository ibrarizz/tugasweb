<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'deskripsi'
    ];
    protected $table = 'Jenis_kontak';

    public function Siswa(){
        return $this->belongsToMany('App\Models\Siswa');
    }
}
