<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
