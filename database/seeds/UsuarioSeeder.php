<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre_rol' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Supervisor',
        ]);



        DB::table('users')->insert([
            'username' => 'admin',
            'nombre' => 'jonathan',
            'apellido' => 'estigarribia',
            'email' => 'estigarribia273'.'@gmail.com',
            'password' => Hash::make('12345'),
            'roles_id' => '1',
        ]);
    }
}
