@extends('layouts.app')                
@section('content')

        <div class="container w-75 my-3 bg-light p-5">
            <h3>Authentification</h3>
            <form action="{{ route("login.post") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old("email")}}"/>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div >

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{ old("password") }}"/>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
@endsection  