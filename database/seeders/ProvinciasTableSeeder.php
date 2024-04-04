<?php

namespace Database\Seeders;
use App\Models\Provincia;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = ['Milano', 'Bergamo', 'Como'];

        foreach($province as $provincia){
            $new_provincia = new Provincia();
            $new_provincia->nome = $provincia;
            $new_provincia->sigla = substr($provincia, 0, 2);
            $new_provincia->regione = "Lombarida";
            $new_provincia->save();
        }
    }
}
