<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete(); /* Exclui todas as linhas contidas na tabela especificada. Executado antes dos insert para garantir que não haja duplicatas */

        DB::table('estados')->insert(['id_estado' => 1, 'nome' => 'Acre', 'sigla' => 'AC']);
        DB::table('estados')->insert(['id_estado' => 2, 'nome' => 'Alagoas', 'sigla' => 'AL']);
        DB::table('estados')->insert(['id_estado' => 3, 'nome' => 'Amapá', 'sigla' => 'AP']);
        DB::table('estados')->insert(['id_estado' => 4, 'nome' => 'Amazonas', 'sigla' => 'AM']);
        DB::table('estados')->insert(['id_estado' => 5, 'nome' => 'Bahia', 'sigla' => 'BA']);
        DB::table('estados')->insert(['id_estado' => 6, 'nome' => 'Ceará', 'sigla' => 'CE']);
        DB::table('estados')->insert(['id_estado' => 7, 'nome' => 'Distrito Federal', 'sigla' => 'DF']);
        DB::table('estados')->insert(['id_estado' => 8, 'nome' => 'Espírito Santo', 'sigla' => 'ES']);
        DB::table('estados')->insert(['id_estado' => 9, 'nome' => 'Goiás', 'sigla' => 'GO']);
        DB::table('estados')->insert(['id_estado' => 10, 'nome' => 'Maranhão', 'sigla' => 'MA']);
        DB::table('estados')->insert(['id_estado' => 11, 'nome' => 'Mato Grosso', 'sigla' => 'MT']);
        DB::table('estados')->insert(['id_estado' => 12, 'nome' => 'Mato Grosso do Sul', 'sigla' => 'MS']);
        DB::table('estados')->insert(['id_estado' => 13, 'nome' => 'Minas Gerais', 'sigla' => 'MG']);
        DB::table('estados')->insert(['id_estado' => 14, 'nome' => 'Pará', 'sigla' => 'PA']);
        DB::table('estados')->insert(['id_estado' => 15, 'nome' => 'Paraíba', 'sigla' => 'PB']);
        DB::table('estados')->insert(['id_estado' => 16, 'nome' => 'Paraná', 'sigla' => 'PR']);
        DB::table('estados')->insert(['id_estado' => 17, 'nome' => 'Pernambuco', 'sigla' => 'PE']);
        DB::table('estados')->insert(['id_estado' => 18, 'nome' => 'Piauí', 'sigla' => 'PI']);
        DB::table('estados')->insert(['id_estado' => 19, 'nome' => 'Rio de Janeiro', 'sigla' => 'RJ']);
        DB::table('estados')->insert(['id_estado' => 20, 'nome' => 'Rio Grande do Norte', 'sigla' => 'RN']);
        DB::table('estados')->insert(['id_estado' => 21, 'nome' => 'Rio Grande do Sul', 'sigla' => 'RS']);
        DB::table('estados')->insert(['id_estado' => 22, 'nome' => 'Rondônia', 'sigla' => 'RO']);
        DB::table('estados')->insert(['id_estado' => 23, 'nome' => 'Roraima', 'sigla' => 'RR']);
        DB::table('estados')->insert(['id_estado' => 24, 'nome' => 'Santa Catarina', 'sigla' => 'SC']);
        DB::table('estados')->insert(['id_estado' => 25, 'nome' => 'São Paulo', 'sigla' => 'SP']);
        DB::table('estados')->insert(['id_estado' => 26, 'nome' => 'Sergipe', 'sigla' => 'SE']);
        DB::table('estados')->insert(['id_estado' => 27, 'nome' => 'Tocantins', 'sigla' => 'TO']);
    }
}
