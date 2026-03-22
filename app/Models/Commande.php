<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_id', 'date_commande'];   

    public function clientt(){
        return $this->belongsTo(Client::class , 'client_id');             // relation N-1 : une commande appartient à un client
    }

    public function detailCommandes(){
        return $this->hasMany(DetailCommande::class);      // relation 1-N : une commande peut avoir plusieurs détails de commande
    }
}
