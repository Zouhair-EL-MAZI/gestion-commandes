<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function statsClients(){
        $stats = DB::table('commandes')
            ->join('clients', 'clients.id', '=', 'commandes.client_id')
            ->select(
                'clients.nom',
                DB::raw('COUNT(commandes.id) as total_commandes')
            )
            ->groupBy('clients.nom')
            ->get();

        return view('stats.clients', compact('stats'));
    }

    public function statsProduits(){
        $stats = DB::table('detail_commandes')
            ->join('produits', 'produits.id', '=', 'detail_commandes.produit_id')
            ->select(
                'produits.nom',
                DB::raw('SUM(detail_commandes.quantite * detail_commandes.prix) as chiffre_affaire')
            )
            ->groupBy('produits.nom')
            ->get();

        return view('stats.produits', compact('stats'));
    }
}
