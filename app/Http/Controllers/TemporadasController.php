<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{

    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas =
            Temporada::query()->where('serie_id', $serieId)->orderBy('numero')->get();
        return view('temporadas.index', ["serie" => $serie, "temporadas" => $temporadas]);
    }
}
