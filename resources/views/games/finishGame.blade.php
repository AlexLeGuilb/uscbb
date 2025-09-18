@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('gamesPlanning') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-6">Score</div>
    </div>
@endsection

@section('body')
    <div class="container-fluid mt-5 pt-5">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card testimonial-card">
            <div class="h3 pt-1">
                {{ $g->date }} - {{ $g->heure }}
            </div>
            <div class="card-body">
                <span class="h5">{{ $g->lieu }}</span>
                <br>
                <span>
                    <span class="font-weight-bold" style="color: #000080;">
                        {{ $t->libelle }}
                    </span>
                    contre
                    <span class="red-text font-weight-bold">{{ $g->adv }}</span>
                </span>
            </div>
            <hr class="divider" />
            <form action="{{ route('finishGamePOST') }}" method="post" class="text-center border border-light mt-3 py-3 px-2">
                @csrf
                <p>Score final du match</p>

                <input type="hidden" id="id_game" name="id_game" value="{{ $g->id }}" readonly required>

                <div class="d-flex flex-row">
                    <input type="number" id="score_eq" name="score_eq" min="0" class="form-control mb-4" placeholder="Score {{ $t->libelle }}" required>
                    <input type="number" id="score_adv" name="score_adv" min="0" class="form-control mb-4" placeholder="Score {{ $g->adv }}" required>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="fini" name="fini" required>
                    <label class="form-check-label" for="fini">Match fini ?</label>
                </div>

                <button class="btn btn-block text-white" style="background-color: #000080;" type="submit">Valider le score</button>
            </form>
        </div>
    </div>
@endsection
