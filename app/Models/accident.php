<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\voiture;
use App\Models\client;



class accident extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'voiture_id',
        'date',
        'status',
        'type',
        'delete',
    ];
    public function voitures(){
        return $this->belongsTo(voiture::class,'voiture_id',"id");
    }
    public function clients(){
        return $this->belongsTo(client::class,'voiture_id',"id");
    }
}
