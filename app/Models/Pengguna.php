<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['email', 'password', 'nama'];


    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_pengguna', 'id_pengguna');
    }
}
