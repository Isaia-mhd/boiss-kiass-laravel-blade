<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function allUsers(){
        $users = User::all();
        $usersTotal = count($users);

        return view("admin.dashboard", compact(["usersTotal"]) );
    }
}
