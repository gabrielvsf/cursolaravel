@extends('layout')

@section('cabecalho')
Animes
@endsection

@section ('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }} 
    </div>
@endif

<ul class="list-group">
    @foreach ($animes as $anime) 
    <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $anime->nome }}
    <form method="post" action="/animes/{{$anime->id}}"
        onsubmit="return confirm ('Tem certeza que deseja excluir o anime?')">
        @csrf
        @method('delete')
        <button class="btn btn-danger mt-2 btn-sm">
            <i class="far fa-trash-alt"></i>
        </button>
    </form>
    </li>
    @endforeach      
</ul>

<a href="/animes/criar" class="btn btn-primary mt-2">Adicionar</a>

@endsection