<?php

use Illuminate\Database\Seeder;
use App\Carreras;
use App\Curriculares;
use App\Estados;
use App\Municipios;
use App\User;
use App\Ciclos;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'ITSPA','email'=>'itspa@gmail.com','password'=>bcrypt('secret')]);
        Carreras::create(['nombre'=>'Ingeniería Ambiental']);
        Carreras::create(['nombre'=>'TIC´s']);
        Carreras::create(['nombre'=>'Ingeniería Biomedica']);
        Carreras::create(['nombre'=>'Ingeniería Gestión Empresarial']);
        Carreras::create(['nombre'=>'Ingeniería Desarrollo Comunitario']);
        Carreras::create(['nombre'=>'Ingeniería Administrativa']);

        Curriculares::create(['nombre'=>'Fútbol', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Básquetbol', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Vóleibol', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Atletismo', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Danza', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Teatro', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Ajedrez', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Música', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Boxeo', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);
        Curriculares::create(['nombre'=>'Artes Plásticas', 'semestres'=>'4', 'descripcion'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.']);

        Estados::create(['nombre'=>'Michoacán']);
        Estados::create(['nombre'=>'Colima']);
        Municipios::create(['nombre'=>'Pátzcuaro', 'idEstado'=>'1']);
        Municipios::create(['nombre'=>'Quiroga','idEstado'=>'1']);
        Municipios::create(['nombre'=>'Tzintzuntzan','idEstado'=>'1']);
        Municipios::create(['nombre'=>'Camecuaro','idEstado'=>'1']);
        Municipios::create(['nombre'=>'Lagunillas','idEstado'=>'1']);
        Municipios::create(['nombre'=>'Eronga','idEstado'=>'1']);
        Municipios::create(['nombre'=>'Murabi','idEstado'=>'2']);
        Municipios::create(['nombre'=>'Costa Linda','idEstado'=>'2']);
        Municipios::create(['nombre'=>'Jutzio','idEstado'=>'2']);
        Ciclos::create(['fechaInicio'=>'2017-01-01','fechaFin'=>'2017-06-06']);

        $this->call(alumnosTableSeeder::class);


    }
}
