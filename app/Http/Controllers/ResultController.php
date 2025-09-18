<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Game;
use App\Models\Result;
use App\Models\Team;

class ResultController extends Controller
{
    function result()
    {
        Carbon::setLocale('fr');
        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDays(30)->format('Y-m-d');

        $games = Game::whereBetween('date', [$startDate, $endDate])->where('fini', 1)->orderBy('date', 'asc')->orderBy('heure', 'asc')->get();
        $teams = Team::all();
        $results = [];
        foreach ($games as $g) {
            array_push($results, Result::where('idGame', $g->id)->first());
        }

        if (count($games) > 0) {
            foreach ($games as $g) {
                $g->date = Carbon::create($g->date)->translatedFormat('d F');
                $g->heure = Carbon::create($g->heure)->translatedFormat('H:i');
            }
        }
        return view('games.result')->with([
            "games" => $games,
            "teams" => $teams,
            "results" => $results,
        ]);
    }
}
