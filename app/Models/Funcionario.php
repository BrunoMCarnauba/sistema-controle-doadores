<?php

namespace App\Models;

//Importações
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros

class Funcionario extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'funcionarios'; /* Nome da tabela do banco */
    /* protected $fillable = ['cpf', 'nome', 'email', 'telefone_fixo', 'telefone_celular', 'data_nascimento', 'data_admissao', 'cargo_id', 'endereco_id', 'sexo', 'usuario', 'senha', 'foto']; /* Quais colunas que podem ser preenchidas pelo usuário do sistema no Banco. Importante pra usar o comando Funcionario::create($request->all()); */
    

}
