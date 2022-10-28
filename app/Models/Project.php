<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'nama',
        'deskripsi',
        'tanggal'
    ];
    protected $table = 'Project';

    public function siswa(){
        return $this->belongsTo('App\Models\Siswa', 'id');
    }
}
