<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'pepe', 'email' => 'pepe@pepe.es', 'password' => Hash::make('123')],
            ['name' => 'marta', 'email' => 'marta@marta.es', 'password' => Hash::make('123')],
            ['name' => 'ana', 'email' => 'ana@ana.es', 'password' => Hash::make('123')],
            ['name' => 'juan', 'email' => 'juan@juan.es', 'password' => Hash::make('123')],
            ['name' => 'laura', 'email' => 'laura@laura.es', 'password' => Hash::make('123')],
            ['name' => 'carlos', 'email' => 'carlos@carlos.es', 'password' => Hash::make('123')],
            ['name' => 'maria', 'email' => 'maria@maria.es', 'password' => Hash::make('123')],
            ['name' => 'pedro', 'email' => 'pedro@pedro.es', 'password' => Hash::make('123')],
            ['name' => 'luisa', 'email' => 'luisa@luisa.es', 'password' => Hash::make('123')],
            ['name' => 'javier', 'email' => 'javier@javier.es', 'password' => Hash::make('123')],
 
        ];

        User::insert($users);
    }
}
