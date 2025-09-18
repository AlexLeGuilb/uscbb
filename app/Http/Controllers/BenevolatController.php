<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Benevolat;
use App\Models\Role;

class BenevolatController extends Controller
{
    function liste()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }
        Carbon::setLocale('fr');
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->addDays(30)->format('Y-m-d');

        $benes = Benevolat::whereBetween('date', [$startDate, $endDate])->where('idBene', auth()->user()->id)->orderBy('date', 'asc')->get();
        $roles = [];
        foreach ($benes as $ben) {
            $r = Role::where('id', $ben->idRole)->first();
            if ($r != null) {
                if (!in_array($r, $roles)) {
                    array_push($roles, $r);
                }
            } else {
                Benevolat::where('id', $ben->id)->delete();
            }
        }
        return view('benevolat.list')->with(['benes' => $benes, 'roles' => $roles]);
    }
}
