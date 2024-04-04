<?php

namespace Database\Seeders;
use App\Models\Comuni;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComuniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lista_comuni = config('comuni');
        foreach($lista_comuni as $comune){
            foreach($comune['comuni'] as $com){
                DB::table('comuni')->insert([
                    'provincia_id' => $comune['id'],
                    'nome' => $com,
                ]);
            }
        }
    }
}
