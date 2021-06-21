@extends('layout')

@section('cabecalho')
Adicionar animes
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf
    <div class=row>

        <div class="col col-8">
            <label for="nome">Nome do anime: </label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2">
            <label for="qtd_temporadas">Nº de temporadas: </label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>

        <div class="col col-2">
            <label for="ep_por_temporada">Nº de episódios: </label>
            <input type="number" class="form-control" name="eps_por_temporada" id="eps_por_temporada">
        </div>

    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection

