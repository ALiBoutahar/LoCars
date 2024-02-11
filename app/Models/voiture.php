<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'matricule',
        'marque',
        'color',
        'km',
        'nbrplace',
        'image',
        'type',
        'delete',
    ];
}
