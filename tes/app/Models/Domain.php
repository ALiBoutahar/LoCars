<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Iprange;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        "domain",
        "domain_sup",
    ];

    
    public function ipranges(){
        return $this->hasMany(Iprange::class, 'domains');
    }
}
