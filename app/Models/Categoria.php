<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //campos publicavéis
    protected $fillable = [ 'nomedacategoria'];

    //nome da chave primaria
    protected $primaryKey = 'pkcategoria';

    //Nome da tabela 
    protected $table = 'categorias';

    //Informa que esta trabalhando com incrementOrDecremento
    public $incrementing = true;

    //não utiliza timestamps nps controles (created & update)
    public $timestamps = false;

}
