<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\voiture;

class assurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'voiture_id',
        'date_d',
        'date_f',
        'ste',
        'agance',
        'prix',
        'status',
        'type',
        'delete',
    ];

    public function voitures(){
        return $this->belongsTo(voiture::class,'voiture_id',"id");
    }
}
