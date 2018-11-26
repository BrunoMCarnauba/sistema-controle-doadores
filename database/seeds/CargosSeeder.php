<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('cargos')->delete(); /* Exclui todas as linhas contidas na tabela especificada. Executado antes dos insert para garantir que não haja duplicatas */

        /* Inserindo na tabela 'cargos' os nomes dos cargos e seus determinados salários. */
        DB::table('cargos')->insert(['id_cargo' => 1, 'nome' => 'Administrador(a)', 'salario' => '5000.00']);
        DB::table('cargos')->insert(['id_cargo' => 2, 'nome' => 'Enfermeiro(a)', 'salario' => '3000.00']);
        DB::table('cargos')->insert(['id_cargo' => 3, 'nome' => 'Recepcionista', 'salario' => '2000.00']);
    }
}
