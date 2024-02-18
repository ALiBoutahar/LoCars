<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reservation;
use App\Models\accident;
use App\Models\assurance;
use App\Models\controle;

class voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'matricule',
        'marque',
        'color',
        'model',
        'km',
        'nbrplace',
        'image',
        'status',
        'type',
        'delete',
    ];
    public function reservations(){
        return $this->hasMany(reservation::class);
    }
    public function controles(){
        return $this->hasMany(controle::class);
    }
    public function accidents(){
        return $this->hasMany(accident::class);
    }
    public function assurances(){
        return $this->hasMany(assurance::class);
    }
}
