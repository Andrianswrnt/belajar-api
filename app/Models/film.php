<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'url_vidio',
        'id_kategori',
        'slug',
    ];

    
    public function kategori()
    {
        return $this->belongsTo(kategori::class , 'id_kategori'); 
    }

    public function genre()
    {
        return $this->belongsToMany(genre::class , 'genre_film', 'id_film', 'id_genre'); 
    }

    public function aktor()
    {
        return $this->belongsToMany(aktor::class , 'actor_film', 'id_film', 'id_aktor'); 
    }
}
