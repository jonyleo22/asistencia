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



        DB::table('sectores_empleados')->insert([
            'nombre_sector' => 'Informatica',
        ]);

        DB::table('sectores_empleados')->insert([
            'nombre_sector' => 'Contable',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Tesorero',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Sub. Tesorero',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Director',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Sub. Director',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Jefe de sector',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'Empleado',
        ]);

        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'DNI',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Libreta civíca',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Libreta de enrolamiento',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Pasaporte',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Cédula de identidad',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Documentación extranjera',
        ]);


        DB::table('tipo_documento')->insert([
            'nombre_tipo_documento' => 'Indocumentado',
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'nombre' => 'jonathan',
            'apellido' => 'estigarribia',
            'direccion_empleado' => 'av lavalle 3642',
            'telefono_empleado' => '3764-817554',
            'tipo_dni_id' => '1',
            'dni_empleado' => '37801086',
            'email' => 'estigarribia273'.'@gmail.com',
            'fecha_ingreso_empleado' => '10/01/2020',
            'sector_id' => '1',
            'cargo_id' => '1',
            'password' => Hash::make('12345'),
            'roles_id' => '1',
        ]);


    }

}
