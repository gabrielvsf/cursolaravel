<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Anime;
use App\Http\Requests\AnimesFormRequest;
use App\Temporada;
use App\Episodio;
use App\Services\CriadorDeAnime;
use App\Services\RemovedorDeAnime;

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

    public function store(AnimesFormRequest $request, CriadorDeAnime $criadorDeAnime){
        
        $anime= $criadorDeAnime->criarAnime($request->nome, $request->qtd_temporadas, $request->eps_por_temporada);

        $request->session()->flash('mensagem',"Anime {$anime->nome} adicionado com sucesso");
        return redirect('/animes');
    }
 
    public function destroy(Request $request, RemovedorDeAnime $removedorDeAnime){

        $nomeAnime = $removedorDeAnime->removerAnime($request->id);
        
        $request->session()->flash('mensagem',"O anime '$nomeAnime' foi removido com sucesso");

        return redirect('/animes');
    }

}