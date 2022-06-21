<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenci extends Model
{
     use HasFactory;
    public $table = 'agenci';

    protected $fillable = [
        'imie','adres', 'email', 'numer_telefonu','zdjecie'

    ];


    public function nieruchomosci(){

        return $this->hasOne(Nieruchomosci::class,'id_agenta');
    }
    public function agent_miesiaca(){

        return $this->hasOne(Agent_miesiaca::class);
    }

}
