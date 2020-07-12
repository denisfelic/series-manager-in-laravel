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

    <form class="container" method="post" action="{{route('criar_serie')}}" >
        @csrf
        <div class="form-group">
            <label for="inputNameSerie">Nome</label>
            <input type="text" class="form-control" id="inputNameSerie" name="nome">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
@endsection
