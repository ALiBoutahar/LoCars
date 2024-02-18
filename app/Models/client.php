<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reservation;
use App\Models\accident;



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
    public function reservations(){
        return $this->hasMany(reservation::class);
    }
    public function accidents(){
        return $this->hasMany(accident::class);
    }
}
