<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Basket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function registerPage(){
        return view("user.register");
    }

    public function store(){
        $validated = request()->validate([
            "name" => "required|min:5|max:20",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|max:20|confirmed",
        ]);

        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            "admin" => 0
        ]);

        return redirect()->route("home")->with("success", "User registered successfully! ");
    }

    public function loginPage() {
        return view("user.login");
    }

    public function login(){

        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(Auth::attempt($validated)){
                request()->session()->regenerate();

                return redirect()->route("home")->with("success", "User logged in successfully !");
        }

        return redirect()->route("login")->withErrors([
            "email" => "Email or password incorrect !"
        ]);


    }


    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::logout();

        return redirect()->route("home")->with("success", "User logged out successfully !");
    }

    public function profile(){
        return view("user.profile");
    }

    public function basket(){
        $baskets = Basket::where("user_id", "=", auth()->id())->paginate(5);
        return view("user.basket", compact("baskets"));
    }
}
