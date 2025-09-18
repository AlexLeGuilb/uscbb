<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Game;
use App\Models\Result;
use App\Models\Team;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    // affiche le planning des matchs pour les 30 prochain jours
    function planning()
    {
        Carbon::setLocale('fr');
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->addDays(30)->format('Y-m-d');

        $games = Game::whereBetween('date', [$startDate, $endDate])->where('fini', 0)->orderBy('date', 'asc')->orderBy('heure', 'asc')->get();
        $teams = Team::all();

        if (count($games) > 0) {
            foreach ($games as $g) {
                $g->date = Carbon::create($g->date)->translatedFormat('d F');
                $g->heure = Carbon::create($g->heure)->translatedFormat('H:i');
            }
        }
        return view('games.planning')->with([
            "games" => $games,
            "teams" => $teams,
        ]);
    }

    // affiche le modal pour inscrire le score final du match
    function planningFinishGame($idGame)
    {
        if (auth()->check()) {
            if (auth()->user()->droit == 'joueur' || auth()->user()->droit == 'guest') {
                return redirect()->back()->withErrors(['finishGameRight' => "Vous n'avez pas les droits pour inscrire un résultat de match."]);
            } else {
                $g = Game::where('id', $idGame)->first();
                $t = Team::where('id', $g->team)->first();

                if ($g != null) {
                    if ($g->date != Carbon::now()->format('Y-m-d')) {
                        return redirect()->back()->withErrors(['finishGameLoad' => "Le match n'est pas aujourd'hui, vous ne pouvez pas le valider."]);
                    } else {
                        $g->date = Carbon::create($g->date)->translatedFormat('d F');
                        return view('games.finishGame')->with(['g' => $g, 't' => $t]);
                    }
                } else {
                    return redirect()->back()->withErrors(['finishGameLoad' => 'Le match est déjà fini ou un problème est survenu.']);
                }
            }
        } else {
            return redirect()->back()->withErrors(['finishGameAuth' => "Vous n'êtes pas connecté."]);
        }
    }

    // traitement de l'enregistrement de la fin de match
    function planningFinishGamePOST(Request $request)
    {
        /**
         * check si la game est fini ou non
         * check si la date est bonne
         * check si la game a déjà été remplie
         * save la game en table
         *
         * redirect vers les résultats
         */
        $request->validate([
            'id_game' => ['required', 'numeric', 'min:0'],
            'score_eq' => ['required', 'numeric', 'min:0'],
            'score_adv' => ['required', 'numeric', 'min:0'],
            'fini' => ['accepted'],
        ]);

        $game = Game::where('id', $request->id_game)->first();
        if ($game == null || $game->fini == true) {
            return Redirect()->back()->withErrors(['finishGamePost' => 'Le match est déjà fini ou un problème est survenu.']);
        } else if ($game->date != Carbon::now()->format('Y-m-d')) {
            return Redirect()->back()->withErrors(['finishGameDate' => "Le match n'est pas aujourd'hui, vous ne pouvez pas le valider."]);
        } else {
            Game::where('id', $game->id)->update([
                'fini' => 1,
            ]);
            Result::create([
                'idGame' => $game->id,
                'score_eq' => $request->score_eq,
                'score_adv' => $request->score_adv,
            ]);

            return redirect()->route('gamesPlanning');
        }
    }
}
