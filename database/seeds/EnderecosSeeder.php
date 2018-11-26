<?php

use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->delete(); /* Exclui todas as linhas contidas na tabela especificada. Executado antes dos insert para garantir que não haja duplicatas */

        DB::table('enderecos')->insert(['id_endereco' => 1, 'cep' => 'Alterar', 'estado' => 'AL', 'cidade' => 'Alterar', 'logradouro' => 'Alterar', 'numero_residencia' => 1]);
    }
}
