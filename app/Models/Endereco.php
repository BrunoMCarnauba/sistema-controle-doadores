<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'enderecos'; /* Nome da tabela do banco de dados */
    public $timestamps = false; /* Por padrão, Eloquent (Método: Modelo::create) espera que as colunas created_at e updated_at existam em suas tabelas. Se você não deseja que essas colunas sejam gerenciadas automaticamente pelo Eloquent, defina a propriedade $ timestamps em seu modelo como false */
    protected $fillable = ['cep', 'estado', 'cidade', 'logradouro', 'numero_residencia', 'complemento']; /* Para poder usar o método create, devemos liberar quais colunas podem ser salvas, para isso adiciona no model a propriedade $fillable. */
}