<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{

    /**
     * @param int $serieId
     * @return string
     */
    public function RemoverSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->deletarTemporada($serie);
            $serie->delete();

        });
        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    private function deletarTemporada($serie): void
    {
        $serie->temporadas()->each(function (Temporada $temporada) {
            $this->deletarEpisodios($temporada);
        });
    }

    /**
     * @param Temporada $temporada
     * @throws \Exception
     */
    private function deletarEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });

        $temporada->delete();
    }
}
