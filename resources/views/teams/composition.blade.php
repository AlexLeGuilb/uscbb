@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
@endsection

@section('page')
    <div class="row">
        <a class="col-3 text-decoration-none text-white" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
        <div class="col-3">Équipes</div>
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
        @foreach ($teams as $t)
            <div class="card my-2">
                <div class="card-header h3">{{ $t->libelle }}</div>
                <div class="card-body table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="tableHeader">Nom</th>
                                <th scope="col" class="tableHeader">Prénom</th>
                                <th scope="col" class="tableHeader">Téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compositions as $comp)
                                @if ($comp->idEquipe == $t->id)
                                    @foreach ($users as $u)
                                        @if ($comp->idJoueur == $u->id)
                                            <tr class="tableRow">
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->firstname }}</td>
                                                <td>{{ $u->phone }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
