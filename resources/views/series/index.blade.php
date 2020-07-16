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
        <div class="alert alert-success">{{ $mensagem }}</div>
    @endif
    <ul class="list-group ">
        @foreach($series as $key => $serie)
            <li class='list-group-item d-flex w-100 justify-content-between align-items-center'>
                <p class='p-0 m-0' id="name-serie-paragraph-{{$key}}">
                    {{ $serie->nome }}
                </p>

                <div class="input-group w-50 justify-content-start" hidden id="name-serie-edit-input-{{$key}}">
                    <input class="w-75" type="text" name="" value="{{$serie->nome}}">
                    <button class="btn btn-primary">
                        <i class="fas fa-check"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <button class="btn btn-primary btn-sm mr-2" onclick="toggleEditNameSerieInput({{$key}})">
                        <i class="fas fa-edit"></i>
                        @csrf
                    </button>
                    <form
                        class="d-flex align-items-center" method="post"
                        action="{{ route('remover_serie', $serie->id) }}"
                        onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome) }} ?')">
                        @csrf
                        <a class="btn btn-info btn-sm mr-2" href="/serie/{{ $serie->id }}/temporadas">
                            <i class="fas fa-external-link-alt"></i></a>
                        @method('DELETE')
                        <button type="submit" class='btn btn-danger btn-sm'><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    <script>

        function toggleEditNameSerieInput(id) {
            const paragraphNameSerie = document.querySelector(`#name-serie-paragraph-${id}`);
            const nameEditInput = document.querySelector(`#name-serie-edit-input-${id}`);

            if (paragraphNameSerie.hasAttribute('hidden')) {
                nameEditInput.setAttribute('hidden', true);
                paragraphNameSerie.removeAttribute('hidden');
            } else {
                nameEditInput.removeAttribute('hidden')
                paragraphNameSerie.setAttribute('hidden', true);
            }

        }
    </script>
@endsection
