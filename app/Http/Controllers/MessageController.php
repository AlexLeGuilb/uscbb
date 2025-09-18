<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
    function liste()
    {
        Carbon::setLocale('fr');
        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDays(30)->format('Y-m-d');

        $messages = Message::whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
        $users = [];
        foreach ($messages as $msg) {
            $u = User::select('id', 'name', 'firstname')->where('id', $msg->idUser)->first();
            if (!in_array($u, $users)) {
                array_push($users, $u);
            }
        }

        return view('messages.list')->with(['messages' => $messages, 'users' => $users]);
    }
}
