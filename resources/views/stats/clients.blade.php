@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Statistiques Commandes par Client</h2>

        <table class="table table-bordered text-center">

            <thead class="table-dark">
                <tr>
                    <th>Client</th>
                    <th>Nombre Commandes</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($stats as $stat)
                    <tr>
                        <td>{{ $stat->nom }}</td>
                        <td>{{ $stat->total_commandes }}</td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
@endsection
