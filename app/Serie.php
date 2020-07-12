<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
//    protected $table = 'series'; // laravel busca automaticamente pelo nome da classe em minusco no plural
    // Então nesse caso não é necessario iniciar a variavel, pois o nome da tabela no banco é ja é "series"

    /*
     *  false -> para ignorar created_at e updated_at, caso queira atualizar, basta definir na migration:
     * $table-> timestamps() -> salva automaticamente update_at e created_at na migration
     */
    public $timestamps = false;

    /*
     * Garante que só os campos fillable sejam preenchidos no orm
     */
    protected $fillable = ['nome'];

}
