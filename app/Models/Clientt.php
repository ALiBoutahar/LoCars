<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientt extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'phone',
        'email',
    ];
}