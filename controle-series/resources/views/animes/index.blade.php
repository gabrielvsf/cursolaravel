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
        <span class="d-flex">
            <a href="animes/{{$anime->id}}/temporadas" class="btn btn-info btn-sm me-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
            <form method="post" action="/animes/{{$anime->id}}"
                onsubmit="return confirm ('Tem certeza que deseja excluir o anime?')">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm me-1">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach      
</ul>

<a href="/animes/criar" class="btn btn-primary mt-2">Adicionar</a>

@endsection