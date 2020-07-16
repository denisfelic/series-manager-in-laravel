<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed nome
 */
class Serie extends Model
{
    // protected $table = 'series'; O Laravel busca automaticamente pelo nome da classe em minusculo no plural
    // Então nesse caso não é necessário iniciar a variável, pois o nome da tabela no banco é ja é "series"

    /*
     *  false -> para ignorar created_at e updated_at, caso queira atualizar, basta definir na migration:
     * $table-> timestamps() -> salva automaticamente update_at e created_at na migration
     */
    public $timestamps = false;

    /*
     * Garante que só os campos fillable sejam preenchidos no orm
     */
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

}
