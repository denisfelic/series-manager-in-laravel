<?php


namespace App\Services;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorSeries
{

    // FIXME: This is only an test.
    public function criarSerie(string $nomeSerie, int $numeroTemporadas, int $quantidadeEpisodios): string
    {

        DB::beginTransaction();
        $newSerie = Serie::create([
            "nome" => $nomeSerie,
        ]);
        $this->criaTemporada($numeroTemporadas, $newSerie, $quantidadeEpisodios);
//        DB::rollBack(); caso der erro, reverte e não aplica.
        DB::commit();
        return $nomeSerie;

    }

    /**
     * @param int $numeroTemporadas
     * @param $serie
     * @param int $quantidadeEpisodios
     */
    private function criaTemporada(int $numeroTemporadas, $serie, int $quantidadeEpisodios): void
    {
        for ($i = 1; $i <= $numeroTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(["numero" => $i]);

            $this->criaEpisodios($quantidadeEpisodios, $temporada);
        }
    }

    /**
     * @param int $quantidadeEpisodios
     * @param $temporada
     */
    private function criaEpisodios(int $quantidadeEpisodios, $temporada): void
    {
        for ($j = 1; $j <= $quantidadeEpisodios; $j++) {
            $temporada->episodios()->create(["numero" => $j]);
        }
    }
}
