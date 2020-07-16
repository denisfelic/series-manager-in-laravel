<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorSeries;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get("mensagem");
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request, CriadorSeries $criadorSeries)
    {
        $nomeSerieCriada = $criadorSeries->criarSerie(
            $request->get('nome'),
            $request->get('numero_temporadas'),
            $request->get('qtd_episodios')
        );

        $request->session()->flash('mensagem', "Série {$nomeSerieCriada} criada com sucesso!");
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->RemoverSerie($request->id);
        $request->session()->flash("mensagem", "Série {$nomeSerie} removida com sucesso!");
        return redirect()->route('listar_series');
    }
}
