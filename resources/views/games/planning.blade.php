@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Matchs</div>
    </div>
@endsection

@section('body')
    <div class="container-fluid mt-3 mb-5 pb-5">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" id="btnCloseAlert" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (count($games) == 0)
            <div class="card">
                <div class="card-body">
                    <p>Il n'y a pas de matchs de prévus pour les 30 prochains jours.</p>
                </div>
            </div>
        @else
        @foreach ($games as $g)
            <div class="card my-3">
                <div class="card-header h3">
                    {{ $g->date }} - {{ $g->heure }}
                </div>
                <div class="card-body">
                    <span class="h5">{{ $g->lieu }}</span>
                    <br>
                    <span>
                        <span class="font-weight-bold" style="color: #000080;">
                            @foreach ($teams as $t) @if ($t->id == $g->team) {{ $t->libelle }} @endif @endforeach
                        </span>
                        contre
                        <span class="red-text font-weight-bold">{{ $g->adv }}</span>
                    </span>
                </div>
                @auth
                    @if ($g->date == \Carbon\Carbon::now()->translatedFormat('d F'))
                        <a href="{{ route('finishGame', $g->id) }}" class="stretched-link"></a>
                    @endif
                @endauth
            </div>
        @endforeach
        @endif
    </div>
    <div class="container-fluid fixed-bottom navbar bottomMenu">
        <span href="" class="col-5 active">Matchs</span>
        <a href="{{ route('gamesResult') }}" class="col-5">Résultats</a>
    </div>
@endsection
