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
        @if (count($results) == 0)
            <div class="card">
                <div class="card-body">
                    <p>Il n'y a pas de résultats dans les 30 derniers jours.</p>
                </div>
            </div>
        @else
        @foreach ($games as $g)
            <div class="card my-3">
                <div class="card-header h3">
                    {{ $g->date }} - {{ $g->heure }}
                </div>
                <div class="card-body">
                    @foreach ($results as $r)
                        @if ($g->id == $r->idGame)
                            @if ($r->score_eq >= $r->score_adv)
                                <span class="green-text h3">Victoire</span>
                            @else
                                <span class="red-text h3">Défaite</span>
                            @endif
                            @break
                        @endif
                    @endforeach
                    <br>
                    <span>
                        <span class="font-weight-bold" style="color: #000080;">
                            @foreach ($teams as $t) @if ($t->id == $g->team) {{ $t->libelle }} @break @endif @endforeach
                        </span>
                        contre
                        <span class="red-text font-weight-bold">{{ $g->adv }}</span>
                    </span>
                    <br>
                    <span class="h4">
                    @foreach ($results as $r)
                        @if ($g->id == $r->idGame)
                            <span style="color: #000080;">{{ $r->score_eq }}</span> - <span class="red-text">{{ $r->score_adv }}</span>
                            @break
                        @endif
                    @endforeach
                    </span>
                </div>
            </div>
        @endforeach
        @endif
    </div>
    <div class="container-fluid fixed-bottom navbar bottomMenu">
        <a href="{{ route('gamesPlanning') }}" class="col-5">Matchs</a>
        <span class="col-5 active">Résultats</span>
    </div>
@endsection
