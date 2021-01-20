<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Restaurante',
            'slug' => Str::slug('Restaurante'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()



        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Hotel',
            'slug' => Str::slug('Hoteles en la ciudad de Fsa'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()



        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Hospital',
            'slug' => Str::slug('Hospitales'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()



        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Bar',
            'slug' => Str::slug('Bares'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()



        ]);
    }
}
