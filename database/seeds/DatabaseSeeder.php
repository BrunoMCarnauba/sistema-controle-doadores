<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Ao executar o comando "php artisan db:seed", serão executadas todas as seeds inseridas nesse método. */
        // $this->call(UsersTableSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CidadesSeeder::class);
        $this->call(EnderecosSeeder::class);
        $this->call(FuncionariosSeeder::class);
    }
}
