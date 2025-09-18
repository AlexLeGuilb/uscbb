<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Composition;
use App\Models\Team;

class TeamController extends Controller
{
    function liste()
    {
        $teams = Team::all();
        $compositions = Composition::all();
        $users = [];
        foreach ($compositions as $comp) {
            $u = User::select('id', 'name', 'firstname', 'phone')->where('id', $comp->idJoueur)->first();
            if (!in_array($u, $users)) {
                array_push($users, $u);
            }
        }

        return view('teams.composition')->with([
            'teams' => $teams,
            'users' => $users,
            'compositions' => $compositions
        ]);
    }
}
