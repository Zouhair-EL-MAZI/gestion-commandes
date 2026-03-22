@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des commandes</h2>

        <a href="{{ route('commandes.create') }}" class="btn btn-primary">
            Ajouter Commande
        </a>
    </div>

    <table class="table table-bordered text-center">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($commandes as $commande)

            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->clientt->nom  }}</td>
                <td>{{ $commande->date_commande }}</td>

                <td>

                    <a href="{{ route('commandes.show',$commande->id) }}" class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="{{ route('commandes.edit',$commande->id) }}" class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('commandes.destroy',$commande->id) }}" method="POST" style="display:inline"  onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande ?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Supprimer
                        </button>

                    </form>

                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $commandes->links() }}

</div>

@endsection