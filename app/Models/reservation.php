<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;
use App\Models\voiture;



class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'voiture_id',
        'km_d',
        'km_f',
        'date_d',
        'date_f',
        'avance',
        'prix',
        'ttc',
        'status',
        'type',
        'delete',
    ];

    public function clients(){
        return $this->belongsTo(client::class,'client_id',"id");
    }

    public function voitures(){
        return $this->belongsTo(voiture::class,'voiture_id',"id");
    }
}
