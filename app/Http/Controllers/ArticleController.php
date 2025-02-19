<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy("created_at", "desc")->paginate(12);
        return view('page.menu', compact('articles'));
    }


    public function show($id)
    {
        $article = Article::find($id);
        // $count = count($article);
        return view('page.view_article', compact('article'));
    }

    public function search(){



            $search = request()->get("search", "");
            $articles = Article::where("name", "like", "%". $search . "%")
            ->orWhere("short_description", "like", "%" . $search . "%")
            ->orWhere("description", "like", "%" . $search . "%")
            ->get();

            return view("page.searched_article", compact("articles"));


    }
}
