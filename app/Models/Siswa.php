<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];
    protected $table = 'Siswa';

    public function kontak(){
        return $this->belongsToMany('App\Models\jenis_kontak')->withPivot('deskripsi');
    }
    public function project(){
        return $this->hasMany('App\Models\Project', 'id_siswa');
    }
}
?>
