@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Modifier Commande</h2>

        <form action="{{ route('commandes.update', $commande->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Client</label>

                <select name="client_id" class="form-control">

                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" @if ($client->id == $commande->client_id) selected @endif>

                            {{ $client->nom }}

                        </option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Date</label>

                <input type="date" name="date_commande" class="form-control" value="{{ $commande->date_commande }}">

            </div>

            <button class="btn btn-primary">
                Modifier
            </button>

        </form>

    </div>
@endsection
