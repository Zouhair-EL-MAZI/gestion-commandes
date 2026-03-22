@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Ajouter Commande</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('commandes.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">Client</label>

                <select name="client_id" class="form-control">
                    <option value="">Sélectionner un client</option>

                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->nom }}
                        </option>
                    @endforeach

                </select>

            </div>


            <div class="mb-3">

                <label class="form-label">Date Commande</label>

                <input type="date" name="date_commande" class="form-control">

            </div>

            <button class="btn btn-success">
                Enregistrer
            </button>

            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">
                Retour
            </a>

        </form>

    </div>
@endsection
