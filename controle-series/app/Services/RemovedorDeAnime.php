<?php

namespace App\Services;

use App\Anime;
use App\Temporada;
use App\Episodio;

class RemovedorDeAnime
{
    public function removerAnime(int $animeId):string
    {
        $anime=Anime::find($animeId);
        $nomeAnime = $anime->nome;
        $anime->temporadas->each(function (Temporada $temporada){
            $temporada->episodios()->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $anime->delete();
        
        return $nomeAnime;
    }
}