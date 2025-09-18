@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('page', 'Accueil')

@section('body')
<div class="container-fluid menuHome mt-3">
    <div class="menuItem1 menuItem">
        <a class="btn btn-flat" href="{{ route('listeMessages') }}"><img class="menuImg" src="{{ asset('img/svg/message.svg') }}" alt="messages"></a>
    </div>
    <div class="menuItem2 menuItem">
        <a class="btn btn-flat" href="{{ route('gamesPlanning') }}"><img class="menuImg" src="{{ asset('img/svg/basketball.svg') }}" alt="matchs et resultats"></a>
    </div>
    <div class="menuItem3 menuItem">
        <a class="btn btn-flat" href="{{ route('listeBenes') }}"><img class="menuImg" src="{{ asset('img/svg/service.svg') }}" alt="bénévolats"></a>
    </div>
    <div class="menuItem4 menuItem">
        <a class="btn btn-flat" href="{{ route('listeEvents') }}"><img class="menuImg" src="{{ asset('img/svg/calendar-event.svg') }}" alt="évènement"></a>
    </div>
    <div class="menuItem5 menuItem">
        <a class="btn btn-flat" href="{{  route('listeEquipe') }}"><img class="menuImg" src="{{ asset('img/svg/team.svg') }}" alt="équipe"></a>
    </div>
    <div class="menuItem6 menuItem">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-flat">
                    <img class="menuImg" src="{{ asset('img/svg/logout-circle.svg') }}" alt="déconnexion">
                </button>
            </form>
        @else
            <a class="btn btn-flat" href="{{ route('login') }}"><img class="menuImg" src="{{ asset('img/svg/login-circle.svg') }}" alt="connexion"></a>
        @endauth
    </div>
</div>

@endsection
