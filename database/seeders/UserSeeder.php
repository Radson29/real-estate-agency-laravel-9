<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::upsert(
            [
                [
                    'imie' => 'Jan','nazwisko' => 'Urban','nazwa_uzytkownika' => 'Jan Urban', 'email' => 'jan@email.pl','role' => '2', 'password' => Hash::make('1234')
                ],
                [
                    'imie' => 'Pawel','nazwisko' => 'Kowalski','nazwa_uzytkownika' => 'Pawel Kowalski', 'email' => 'pawel@email.pl','role' => '2', 'password' => Hash::make('1234')
                ],
                [
                    'imie' => 'Anna','nazwisko' => 'Nowak','nazwa_uzytkownika' => 'Anna Nowak', 'email' => 'anna@email.pl','role' => '2', 'password' => Hash::make('1234')
                ],
                [
                    'imie' => 'Marta','nazwisko' => 'Januszewska','nazwa_uzytkownika' => 'Marta Januszewska', 'email' => 'marta@email.com','role' => '2', 'password' => Hash::make('1234')
                ],
                [
                    'imie' => 'Szymon','nazwisko' => 'Kot','nazwa_uzytkownika' => 'Szymon Kot', 'email' => 'szymon@email.pl','role' => '2', 'password' => Hash::make('1234')
                ],
                [
                    'imie' => 'Radoslaw','nazwisko' => 'Kaczka','nazwa_uzytkownika' => 'Radoslaw Kaczka', 'email' => 'radek@admin.pl','role' => '0', 'password' => Hash::make('1234')
                ]

            ],
            'imie'
        );
    }
}
