@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Connexion</div>
    </div>
@endsection

@section('body')

<form class="mt-5 p-5" method="POST" action="{{ route('password.email') }}">
    @csrf
    <p class="h2 my-5 text-center">Modifier mot de passe</p>


    <div class="mb-4 text-sm">
        Mot de passe oublié ? Renseignez votre adresse mail et un lien vous sera envoyé pour réinitialiser votre mot de passe.
    </div>
    <div class="text-left">
        <label class="font-weight-bold" for="email">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="mail@exemple.fr" value="{{ old('email') }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-block my-4 text-white" style="background-color: #000080;" type="submit">Réinitialiser le mot de passe</button>
</form>

@endsection
