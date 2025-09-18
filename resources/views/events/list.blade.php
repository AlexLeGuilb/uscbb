@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Evenements</div>
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
        @if (count($evenements) == 0)
            <div class="card">
                <div class="card-body">
                    <p>Il n'y a pas d'évènements dans les 30 prochains jours.</p>
                </div>
            </div>
        @else
        @foreach ($evenements as $eve)
            <div class="card my-3">
                <div class="card-header h3">
                    {{ $eve->titre }}
                </div>
                <div class="card-body">
                    <p class="text-left font-weight-light">
                        Le : <strong>{{ \Carbon\Carbon::create($eve->date)->translatedFormat('d F') }}</strong> à <strong>{{ \Carbon\Carbon::create($eve->heure)->translatedFormat('H:i') }}</strong><br/>
                    </p>
                    <p class="h4">{{ $eve->lieu }}</p>
                    <p class="text-justify">{!! nl2br(e($eve->description)) !!}</p>
                    <div class="text-right font-weight-light">
                        @foreach ($users as $u) @if ($u->id == $eve->idUser)émetteur : {{ $u->name }} {{ $u->firstname }} @endif @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection
