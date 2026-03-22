<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'email', 'telephone'];   

    public function commandes(){
        return $this->hasMany(Commande::class);             // relation 1-N : un client peut avoir plusieurs commandes
    }
}
