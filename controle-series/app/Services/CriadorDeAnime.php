<?php

namespace App\Services;

use App\Anime;

class CriadorDeAnime
{
    public function criarAnime(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada):Anime
    {
        $anime = Anime::create(['nome'=> $nomeSerie]);
        for($i=1; $i <= $qtdTemporadas; $i++){
            $temporada= $anime->temporadas()->create(['numero' => $i]);
            for($j=1; $j <= $epPorTemporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return $anime;
    }
}