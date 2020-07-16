@extends('layout')

@section('titulo')
    Adicionar série
@endsection

@section('cabecalho')
    Adicionar série
@endsection
{{--Test--}}
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

    <form class="container" method="post" action="{{route('criar_serie')}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <label for="inputNameSerie">Nome</label>
                <input type="text" class="form-control" id="inputNameSerie" name="nome">
            </div>

            <div class="form-group col-md-2">
                <label for="numeroTemporadas">N° temporadas</label>
                <input type="number" class="form-control" id="numeroTemporadas" name="numero_temporadas">
            </div>

            <div class="form-group col-md-2">
                <label for="qtdEpisodios">Ep. por temporada</label>
                <input type="number" class="form-control" id="qtdEpisodios" name="qtd_episodios">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
@endsection
