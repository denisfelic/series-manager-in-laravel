<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Serie;
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

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->get("nome");
        Serie::create([
            "nome" => $nome,
        ]);
        $request->session()->flash("mensagem", "Série {$nome} criada com sucesso!");
        return redirect()->route('listar_series');

        // 2 forma automatica
//        Serie::create([
//            $request->all(),
//        ]);
        // 3 forma manual
//        $serie = new Serie();
//        $serie->nome = $nome;
//        $serie->save();

    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash("mensagem", "Série removida com sucesso!");
        return redirect( )->route('listar_series');
    }
}
