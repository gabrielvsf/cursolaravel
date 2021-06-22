<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;

class TemporadasController extends Controller
{
    public function index(int $animeId){
        $serie=Anime::find($animeId);
        $temporadas= $serie->temporadas;

        return view('temporadas.index',compact('serie', 'temporadas'));
    }
}
