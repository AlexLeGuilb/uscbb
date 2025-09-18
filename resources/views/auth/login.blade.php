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

<form class="mt-5 p-2" method="POST" action="{{ route('login') }}">
    @csrf
    <p class="h1 my-5 text-center">Connexion</p>

    <div class="card p-3">
        <div class="text-left">
            <label class="font-weight-bold" for="email">E-Mail</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="mail@exemple.fr" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <br>

            <label class="font-weight-bold" for="password">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <br/>

        <div class="d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Rester connecté ?</label>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
        </div>

        <button class="btn btn-block my-4 text-white" style="background-color: #000080;" type="submit">Connexion</button>
    </div>
</form>

@endsection
