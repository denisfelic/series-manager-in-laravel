@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Série {{$serie->nome}}
@endsection

@section('conteudo')
    <h1>Temporadas</h1>
    <ul class="list-group ">
        @foreach($temporadas as $temporada)
            <li class='list-group-item d-flex w-100 justify-content-between align-items-center'>
                <p class='p-0 m-0'>Temporada {{ $temporada->numero }} </p>
            </li>
        @endforeach
    </ul>

@endsection
