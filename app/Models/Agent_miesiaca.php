<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent_miesiaca extends Model
{
    use HasFactory;
    public $table = 'agent_miesiaca';
    protected $fillable = [
        'id_agenta'

    ];


    public function agenci(){

        return $this->belongsTo(Agenci::class,'id_agenta');
    }
    
}
