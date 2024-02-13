<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cin',
        'nom',
        'prenom',
        'phone',
        'email',
        'status',
        'type',
        'delete',
    ];
}
