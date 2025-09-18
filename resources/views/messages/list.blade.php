@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Messages</div>
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
        @if (count($messages) == 0)
            <div class="card">
                <div class="card-body">
                    <p>Il n'y a pas de messages dans les 30 derniers jours.</p>
                </div>
            </div>
        @else
        @foreach ($messages as $msg)
            <div class="card my-3">
                <div class="card-header h3">
                    {{ $msg->titre }}
                </div>
                <div class="card-body">
                    <p class="text-left font-weight-light">
                        <i>Écrit le</i> : <strong>{{ \Carbon\Carbon::create($msg->date)->translatedFormat('d F') }}</strong>
                    </p>
                    <p class="text-justify h5">{!! nl2br(e($msg->description)) !!}</p>
                    <div class="text-right font-weight-light">
                        @foreach ($users as $u) @if ($u->id == $msg->idUser)émetteur : {{ $u->name }} {{ $u->firstname }} @endif @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
@endsection
