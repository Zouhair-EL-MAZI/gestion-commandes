<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use App\Models\Client;
use App\Models\DetailCommande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::with('clientt')->paginate(10);
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('commandes.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommandeRequest $request)
    {
 
        // Commande::create($request->all());              // $request->all() --> ila darna haka khase l'input name f form ykoun nafsu b7al l'attribut f model aw table
        Commande::create([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commande = Commande::with(['clientt','detailCommandes'])->findOrFail($id);
        $produits = Produit::all();                                                     // باش نجيبو لائحة ديال المنتجات باش نضيفوهم فـ commande

        return view('commandes.show', compact('commande', 'produits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commande = Commande::findOrFail($id);
        $clients = Client::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommandeRequest $request, string $id)
    {


        $commande = Commande::findOrFail($id);
        $commande->update([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande updated successfully.');                 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande deleted successfully.');
    }


    public function addProduct(Request $request, $id){
        // 1. التأكد من البيانات (Validation)
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        // 2. نجيبو الثمن ديال المنتج من جدول Produits
        $produit = Produit::findOrFail($request->produit_id);

        // 3. نسجلو السطر الجديد فـ DetailCommande
        // استعملنا updateOrInsert أو create باش نطبقو النقطة 13 فـ الـ TP
        DetailCommande::create([
            'commande_id' => $id,
            'produit_id'  => $request->produit_id,
            'quantite'    => $request->quantite,
            'prix'        => $produit->prix                  // هادي ضرورية حيت الثمن كيكون فـ الـ Detail
        ]);

        // 4. نرجعو لـ نفس الصفحة مع رسالة نجاح
        return redirect()->back()->with('success', 'Produit ajouté à la commande avec succès !');
        }
}
