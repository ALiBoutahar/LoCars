<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
