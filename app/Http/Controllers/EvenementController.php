<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Evenement;

class EvenementController extends Controller
{
    function liste()
    {
        Carbon::setLocale('fr');
        $endDate = Carbon::now()->addDays(30)->format('Y-m-d');
        $startDate = Carbon::now()->format('Y-m-d');

        $evenements = Evenement::whereBetween('date', [$startDate, $endDate])->orderBy('date', 'desc')->get();
        $users = [];
        foreach ($evenements as $eve) {
            $u = User::select('id', 'name', 'firstname')->where('id', $eve->idUser)->first();
            if (!in_array($u, $users)) {
                array_push($users, $u);
            }
        }

        return view('events.list')->with(['evenements' => $evenements, 'users' => $users]);
    }
}
