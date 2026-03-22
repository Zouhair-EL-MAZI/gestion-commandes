@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4">Chiffre d'affaires par Produit</h2>

        <table class="table table-bordered text-center">

            <thead class="table-dark">
                <tr>
                    <th>Produit</th>
                    <th>Chiffre d'affaires</th>
                </tr>
            </thead>

            <tbody>

                @forelse($stats as $stat)
                    <tr>
                        <td>{{ $stat->nom }}</td>
                        <td>{{ $stat->chiffre_affaire }} DH</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="2">Aucune donnée disponible</td>
                    </tr>
                @endforelse

            </tbody>

        </table>
        

    </div>
@endsection
