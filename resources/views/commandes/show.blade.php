@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Détail Commande</h2>

        <div class="card">
            <div class="card-body">
                <p><strong>ID :</strong> {{ $commande->id }}</p>
                {{-- استعملنا ? هنا باش نتفاداو الـ Error ديال قبيلة --}}
                <p><strong>Client :</strong> {{ $commande->clientt->nom ?? 'Client Introuvable' }}</p>
                <p><strong>Date :</strong> {{ $commande->date_commande }}</p>
            </div>
        </div>

        <h4 class="mt-4">Produits</h4>

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produit ID</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->detailCommandes as $detail)
                    <tr>
                        <td>{{ $detail->produit_id }}</td>
                        <td>{{ $detail->quantite }}</td>
                        <td>{{ $detail->prix }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- الكود ديال إضافة منتج جديد --}}
        <div class="card mt-4">
            <div class="card-header bg-success text-white">Ajouter un produit</div>
            <div class="card-body">
                <form action="{{ route('commandes.addProduct', $commande->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <select name="produit_id" class="form-select" required>
                                <option value="">Sélectionner un produit</option>
                                @foreach($produits as $p)
                                    <option value="{{ $p->id }}">{{ $p->nom }} ({{ $p->prix }} DH)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" name="quantite" class="form-control" placeholder="Quantité" min="1" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>

    </div>
@endsection