<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AgenciSeeder extends Seeder
{

    public function run()
    {
        DB::table('agenci')->insert([
            'imie'=>'Paweł',
            'adres'=>'Rzeszów ul.Rejtana 14',
            'email' => 'pawel@agent.pl',
            'numer_telefonu' => 213378908,
            'zdjecie' => '/assets/img/agenci_zdjecie/man1.jpg',
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
        DB::table('agenci')->insert([
            'imie'=>'Marta',
            'adres'=>'Warszawa ul.Targowa',
            'email' => 'marta@agent.pl',
            'numer_telefonu' => 909776567,
            'zdjecie' => '/assets/img/agenci_zdjecie/woman1.jpg',
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
        DB::table('agenci')->insert([
            'imie'=>'Radosław',
            'adres'=>'Kraków',
            'email' => 'radoslaw@agent.pl',
            'numer_telefonu' => 777666555,
            'zdjecie' => '/assets/img/agenci_zdjecie/man2.jpg',
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
    }
}
