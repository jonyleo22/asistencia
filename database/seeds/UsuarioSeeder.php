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

        DB::table('roles')->insert([
            'nombre_rol' => 'Empleado',
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
            'nombre_cargo' => 'DIREC.GENERAL DE CORDINACIÓN Y CONTROL',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DIREC. INGRESOS PUBLICOS',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DIREC. CONTABIL. Y ADMINISTRACIÓN BANCARIA',
        ]);


        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DIR. GESTION FINANCIERA',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. MOVIMIENTO DE FONDO',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. MOVIMINETO BANCARIO',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. RENDICION CONTABLE',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. PATRIMONIO',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. DESPACHO',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. INFORMATICA',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. INGRESOS PROVINCIALES',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. CONTROL DE GESTION',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'DPTO. INGRESOS NACIONALES',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'ADMINISTRACIÓN',
        ]);

        DB::table('cargo_empleado')->insert([
            'nombre_cargo' => 'PROFECIONAL',
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
            'tipo_dni_id' => '1',
            'dni_empleado' => '37801086',
            'email' => 'estigarribia273'.'@gmail.com',
            'sector_id' => '1',
            'cargo_id' => '1',
            'password' => Hash::make('12345'),
            'roles_id' => '1',
        ]);

    }

}
