<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addToBasket(Article $article){
        $validated = request()->validate([
            "quantity" => "required"
        ]);
        Basket::create([
            "user_id" => auth()->user()->id,
            "article_id" => $article->id,
            "quantity" => $validated["quantity"],
            "price_unit" => $article->price,
            "total_price" => $article->price * $validated["quantity"]
        ]);


        return redirect()->route("basket.show");
    }

    public function delete($basket){
        $basket = Basket::where("id", "=", $basket);
        $basket->delete();
        return redirect()->route("basket.show")->with("success", "Basket deleted successfully !");
    }

}
