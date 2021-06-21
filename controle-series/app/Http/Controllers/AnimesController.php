<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Anime;
use App\Http\Requests\AnimesFormRequest;


class AnimesController extends Controller
{
   public function index(Request $request) {

        $animes = Anime::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
    
       
        return view('animes.index', compact('animes', 'mensagem')); 

    }

    public function create(){

        return view('animes.create');

    }

    public function store(AnimesFormRequest $request){
        
        $anime = Anime::create(['nome'=> $request-> nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        for($i=1; $i <= $qtdTemporadas; $i++){
            $temporada= $anime->temporadas()->create(['numero' => $i]);
            for($j=1; $j <= $request->eps_por_temporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        
        $request->session()->flash('mensagem',"Anime {$anime->nome} adicionado com sucesso");
        return redirect('/animes');
    }

    public function destroy(Request $request){
        Anime::destroy($request->id);

        $request->session()->flash('mensagem',"Anime removido com sucesso");

        return redirect('/animes');
    }

}