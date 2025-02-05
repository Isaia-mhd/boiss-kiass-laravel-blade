<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Models\Article;
use App\Models\Basket;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public function registerPage(){
        return view("user.register");
    }

    public function register(){
        try{
            $validated = request()->validate([
                "name" => "required|min:5|max:20",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8|max:20|confirmed",
            ]);
    
            $user = User::create([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "password" => Hash::make($validated["password"]),
                "admin" => 0
            ]);
    
            event(new Registered($user));
    
            return redirect()->route("home")->with("success", "We have sent an E-mail verification to " . $user->email) . " !";
        } catch(Exception $e){
            throw $e;
        }

    }

    public function loginPage() {
        return view("user.login");
    }

    public function login(){

        $validated = request()->validate([
            "email" => "required|email|exists:users",
            "password" => "required"
        ]);


        $user = User::where("email", $validated["email"])->first();

        if($user && Hash::check($validated["password"], $user->password)){
                request()->session()->regenerate();
                Auth::login($user);

                

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


    // SOCIALITE GOOGLE

    public function redirectToGoogle(){
        return Socialite::driver("google")->redirect();
    }

    public function googleCallback(){
        try {
            $googleUser = Socialite::driver("google")->user();

        
            $user = User::where("email", $googleUser->email)->first();
            if(!$user){
                User::create([
                    "email" => $googleUser->getEmail(),
                    "name" => $googleUser->getName(),
                    "email_verified_at" => now(),
                    "google_id" => $googleUser->getId(),
                    "password" => bcrypt("random_password")
                ]);


                return redirect()->route("home")->with("success","User registered successfully!");
            }

            Auth::login($user);

            return redirect()->route("home")->with("success", "User logged in successfully !");
        } catch (RequestException $e) {
            return redirect()->back()->with('error', 'Impossible de se connecter à Internet. Vérifiez votre connexion et réessayez.');
    
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Erreur de connexion à la base de données. Veuillez contacter l\'administrateur.');
    
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Une erreur inattendue s\'est produite. Veuillez réessayer.');
        }
    }
}
