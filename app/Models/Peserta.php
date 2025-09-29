<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PesertaFactory> */
    use HasFactory;
    protected $table = 'pesertas';

    protected $fillable = [
        'nisn',
        'name',
        'password',
        'kelas',
        'jurusan',
        'vote_status',
        'vote_number',
        'role',
        'device_token',
        'vote_at',
        'last_login_at',
        'last_logout_at'
    ];

    protected $hidden =[
        'password'
    ];

    // relasi dengan model Kandidat 
    public function votedFor(){
        return $this->belongsTo(Kandidat::class, 'vote_number', 'no_kandidat');
    }
}
