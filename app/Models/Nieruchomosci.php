<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nieruchomosci extends Model
{
     use HasFactory;
    public $table = 'nieruchomosci';
    protected $fillable = [
        'tytuł','opis', 'cena', 'powierzchnia','sypialnie',
        'garaże','łazienki','Miasto','Kraj','zdjecie_opcjonalne0', 'zdjecie_opcjonalne1','zdjecie_opcjonalne2',
        'zdjecie_opcjonalne3','id_agenta','Czy_opublikowany','created_at','updated_at'
    ];

    public function agenci(){

    return $this->belongsTo(Agenci::class,'id_agenta');
    }


}
