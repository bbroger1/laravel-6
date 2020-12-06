<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //chamada da factories User Factory
        factory(User::class, 5)->create();

        //chamada para criação de usuário único
        /* User::create([
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
        ]); */
    }
}
