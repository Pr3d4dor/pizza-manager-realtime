<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Pedido Criado',
            'percent' => 10,
        ]);

        Status::create([
            'name' => 'Preparação',
            'percent' => 30,
        ]);

        Status::create([
            'name' => 'Assando',
            'percent' => 50,
        ]);

        Status::create([
            'name' => 'Checagem de Qualidade',
            'percent' => 70,
        ]);

        Status::create([
            'name' => 'Saiu para Entrega',
            'percent' => 100,
        ]);
    }
}
