<?php

namespace App;

use App\Anime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    use HasFactory;

    public function episodios () {
        return $this->hasMany(Episodio::class);
    }

    public function anime () {
        return $this->belongsTo(Anime::class);
    }
}
