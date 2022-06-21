<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KontaktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontakt')->insert([
            'Imie'=>'Paweł',
            'email' => 'pawel@email.pl',
            'numer_telefonu' => 213378908,
            'opis' => 'pytanie mam',
            'id_nieruchomosci' => 1,
            'id_uzytkownika' => 2,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
        DB::table('kontakt')->insert([
            'Imie'=>'Jan',
            'email' => 'jan@wp.pl',
            'numer_telefonu' => 123456789,
            'opis' => 'bardzo ladny domek',
            'id_nieruchomosci' => 2,
            'id_uzytkownika' => 1,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
        DB::table('kontakt')->insert([
            'Imie'=>'Anna',
            'email' => 'anna@email.pl',
            'numer_telefonu' => 123456789,
            'opis' => 'mozna ustalić szczegoly zakupu ?',
            'id_nieruchomosci' => 3,
            'id_uzytkownika' => 3,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
        DB::table('kontakt')->insert([
            'Imie'=>'Marta',
            'email' => 'marta@email.com',
            'numer_telefonu' => 123456789,
            'opis' => 'mozna ustalic szczegoly spotkania ?',
            'id_nieruchomosci' => 4,
            'id_uzytkownika' => 4,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s"),
        ]);
    }
}
