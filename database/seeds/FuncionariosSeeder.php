<?php

use Illuminate\Database\Seeder;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('funcionarios')->delete(); /* Exclui todas as linhas contidas na tabela especificada. Executado antes dos insert para garantir que não haja duplicatas */

        /* Seeder criado para que já tenha um funcionário cadastrado, para poder logar no sistema pela primeira vez. */
        
        /* Forma 1 de insert: DB::insert('insert into funcionarios (nome, usuario, senha, cargo_id) values (?, ?, ?, ?)', ['Admin', 'admin', 'admin', 1,]); /* Inserindo a palavra 'admin' nas colunas nome, usuario e senha da tabela funcionarios e cargo_id = 1. */
        
        /* Forma 2 de insert: */
        DB::table('funcionarios')->insert(['id_funcionario' => 1, 'nome' => 'Admin => Alterar cadastro!', 'usuario' => 'admin', 'senha' => 'admin', 'cargo_id' => 1, 'cpf' => 'Alterar', 'email' => 'Alterar', 'data_nascimento' => '2000-01-01', 'endereco_id' => 1, 'sexo' => 'M']);
    }
}