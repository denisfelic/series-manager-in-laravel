@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Controle de Séries
@endsection

@section('conteudo')

    <div class="container d-flex my-2 p-0 w-100 justify-content-end">
        <a href="{{ route("criar_serie") }}" class="btn btn-primary">Adicionar nova série</a>
    </div>
    @if(isset($mensagem))
        <div class="alert alert-success">{{$mensagem}}</div>
    @endif
    <ul class="list-group ">
        @foreach($series as $serie)
            <li class='list-group-item d-flex w-100 justify-content-between align-items-center'>
                <p class='p-0 m-0'>{{ $serie->nome }}</p>
                <form method="post" action="{{route('remover_serie', $serie->id)}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome)  }} ?')" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='btn'><i class="far fa-trash-alt"></i></button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection
