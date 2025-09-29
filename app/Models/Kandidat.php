<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kandidat extends Model
{
    /** @use HasFactory<\Database\Factories\KandidatFactory> */
    use HasFactory;

    protected $table = 'kandidats';

    protected $fillable = [
        'name',
        'jumlah_vote',
        'no_kandidat',
        'visi',
        'foto_kandidat'
    ];

    public function voters()
    {
        return $this->belongsTo(Kandidat::class, 'vote_number', 'no_kandidat');
    }

    public function misi(): HasMany
    {
        return $this->hasMany(Misi::class, 'kandidat_id');
    }

    public function limitMisi($limit = 6)
    {
        return $this->hasMany(Misi::class)->latest()->limit($limit);
    }
}
