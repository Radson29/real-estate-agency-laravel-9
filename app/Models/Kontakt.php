<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    use HasFactory;
    public $table = 'kontakt';
    protected $fillable = [
        'Imie', 'email', 'numer_telefonu','opis','id_nieruchomosci','id_uzytkownika'

    ];


    public function nieruchomosci(){

    return $this->belongsTo(Nieruchomosci::class,'id_nieruchomosci');
    }

    public function user(){

    return $this->belongsTo(User::class,'id_uzytkownika');
    }

}
