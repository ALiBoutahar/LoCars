<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domain;

class Iprange extends Model
{
    use HasFactory;
    protected $fillable = [
        "domain_id",
        "ip_ranges",
        "start",
        "end",
    ];

    public function Domains(){
        return $this->belongsTo(Domain::class,'domain_id',"id");
    }
}
