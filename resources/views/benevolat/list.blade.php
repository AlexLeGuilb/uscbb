@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Bénévolats</div>
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
        @if (count($benes) == 0 || count($roles) == 0)
            <div class="card">
                <div class="card-body">
                    <p>Il n'y a pas de bénévolats pour toi dans les 30 prochains jours.</p>
                </div>
            </div>
        @else
        <div class="alert alert-warning alert-dismissible fade show text-justify" role="alert">
            Si tu as une <strong>indisponibilité</strong> pour l'un ou plusieurs des bénévolats, <strong>merci de prévenir ton coach ou un membre du bureau.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @foreach ($benes as $be)
            <div class="card my-3">
                @foreach ($roles as $r)
                    @if($r->id == $be->idRole)
                        <div class="h3 card-header">
                            {{ $r->titre }}
                        </div>
                        <div class="card-body">
                            <p class="text-left font-weight-light">
                                Le : <strong>{{ \Carbon\Carbon::create($be->date)->translatedFormat('d F') }}</strong> à <strong>{{ \Carbon\Carbon::create($be->heure)->translatedFormat('H:i') }}</strong><br/>
                            </p>
                            <p class="h4">{{ $be->lieu }}</p>
                            <p class="text-justify">{!! nl2br(e($r->description)) !!}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
        @endif
    </div>
@endsection
