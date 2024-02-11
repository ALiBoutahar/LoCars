<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
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
}
