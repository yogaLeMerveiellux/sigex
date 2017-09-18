<?php

use Illuminate\Database\Seeder;
use App\Alumnos;

class alumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alumnos::class, 500)->create();
    }
}
